<?php
    //外部ファイルの読み込み
    require_once 'models/Oil.php';
    require_once 'DAOs/DAO.php';
    //DAO: DBを扱う専門家
    class OilDAO extends DAO{

        //DBから全オイル情報を取得し、並べ替える
        public static function get_all_oils_sort(){
        // 例外処理
            try{
                // データベースに接続して万能の神様誕生
                $pdo = self::get_connection();
                // SELECT文実行 statement object
                $stmt = $pdo->query('SELECT * FROM essential_oils ORDER BY english_name ASC');
                // Fetch ModeをOilクラスに設定
                $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Oil');
                // SELECT文の結果を Oilクラスのインスタンス配列に格納
                $oils = $stmt->fetchAll();
                
            }catch(PDOException $e){
            }finally{
                // 後処理
                self::close_connection($pdo, $stmt);
            }
            // 完成したユーザー一覧、はいあげる
            return $oils;    
        }
                //DBから全オイル情報を取得する
        public static function get_all_oils(){
        // 例外処理
            try{
                // データベースに接続して万能の神様誕生
                $pdo = self::get_connection();
                // SELECT文実行 statement object
                $stmt = $pdo->query('SELECT * FROM essential_oils');
                // Fetch ModeをOilクラスに設定
                $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Oil');
                // SELECT文の結果を Oilクラスのインスタンス配列に格納
                $oils = $stmt->fetchAll();
                
            }catch(PDOException $e){
            }finally{
                // 後処理
                self::close_connection($pdo, $stmt);
            }
            // 完成したユーザー一覧、はいあげる
            return $oils;    
        }

        //$idを指定して1つのオイル情報を取得する
        public static function get_oil($id){
            //例外処理
             try{
                // データベースに接続して万能の神様誕生
                $pdo = self::get_connection();
                // SELECT文の実行準備(:idは適当、不明確)
                $stmt = $pdo->prepare('SELECT * FROM essential_oils WHERE id=:id');
                // バインド処理（あいまいだった値を具体的な値で穴埋めする）
                $stmt->bindValue(':id', $id, PDO::PARAM_INT);
                // SELECT文本番実行
                $stmt->execute();

                // Fetch ModeをOilクラスに設定
                $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Oil');
                // SELECT文の結果を Oilクラスのインスタンスに格納
                $oil = $stmt->fetch();
                
            }catch(PDOException $e){
                
            }finally{
                // 後処理
                self::close_connection($pdo, $stmt);
            }
            // 完成したユーザー、はいあげる
            return $oil;  
        }
        // idからオイルデータを抜き出すメソッド
        public static function get_oil_by_id($id){
            try {
                $pdo = self::get_connection();
                $stmt = $pdo->prepare('SELECT * FROM essential_oils WHERE id = :id');
                // バインド処理
                $stmt->bindParam(':id', $id, PDO::PARAM_INT);
                // 実行
                $stmt->execute();
                $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Oil');
                // フェッチの結果を、Oilクラスのインスタンスにマッピングする
                $oil = $stmt->fetch();
            
                self::close_connection($pdo, $stmt);
                // メッセージクラスのインスタンスを返す
                return $oil;
            } catch (PDOException $e) {
                return null;
            }
        }
        // user_idからoil情報抜き出すためのメソッド
        public static function get_all_oils_by_user_id($user_id){
            try {
                $pdo = self::get_connection();
                $stmt = $pdo->prepare('SELECT * FROM essential_oils WHERE user_id = :user_id ORDER BY english_name ASC');
                // バインド処理
                $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
                // 実行
                $stmt->execute();
                $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Oil');
                // フェッチの結果を、Oilクラスのインスタンスにマッピングする
                $oils = $stmt->fetchAll();
                //var_dump($relations);
                return $oils;
                
            } catch (PDOException $e) {
                self::close_connection($pdo, $stmt);
            }
        }


        // user_idからoil nameを抜き出すためのメソッド
        public static function get_all_oils_by_user_id_for_relations($user_id){
            try {
                $pdo = self::get_connection();
                $stmt = $pdo->prepare('SELECT * FROM relations WHERE user_id = :user_id');
                // バインド処理
                $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
                // 実行
                $stmt->execute();
                $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Relation');
                // フェッチの結果を、Oilクラスのインスタンスにマッピングする
                $relations = $stmt->fetchAll();
                //var_dump($relations);
        
                $oils = array();
                foreach($relations as $relation){
                    $oil = self::get_oil($relation->oil_id);
                    $oils[] = $oil;
                }
                //var_dump($oils);
                
            } catch (PDOException $e) {
                self::close_connection($pdo, $stmt);
            }
            return $oils;
        }

        /*
        //$name指定して1つのオイル情報を取得する
        public static function get_oil_id_by_name($name){
            //例外処理
             try{
                // データベースに接続して万能の神様誕生
                $pdo = self::get_connection();
                // SELECT文の実行準備(:idは適当、不明確)
                $stmt = $pdo->prepare('SELECT * FROM essential_oils WHERE name=:name');
                // バインド処理（あいまいだった値を具体的な値で穴埋めする）
                $stmt->bindValue(':name', $name, PDO::PARAM_INT);
                // SELECT文本番実行
                $stmt->execute();

                // Fetch ModeをOilクラスに設定
                $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Oil');
                // SELECT文の結果を Oilクラスのインスタンスに格納
                $oil = $stmt->fetch();
                
            }catch(PDOException $e){
                
            }finally{
                // 後処理
                self::close_connection($pdo, $stmt);
            }
            // 完成したユーザー、はいあげる
            return $oil;  
        }
        */
        //新規oil登録をするメソッド
        public static function insert($oil) {
            // 例外処理
            try{
                // データベースに接続して万能の神様誕生
                $pdo = self::get_connection();
                // 具体的な値はあいまいにしたまま INSERT文の実行準備
                $stmt = $pdo->prepare('INSERT INTO essential_oils(name, scientific_name, plant_name, extraction, aroma, caution, english_name, user_id, image) VALUES(:name, :scientific_name, :plant_name, :extraction, :aroma, :caution, :english_name, :user_id, :image)');
                // バインド処理（あいまいだった値を具体的な値で穴埋めする）
                //文字列　‗STR　　整数‗INT
                $stmt->bindValue(':name', $oil->name, PDO::PARAM_STR);
                $stmt->bindValue(':scientific_name', $oil->scientific_name, PDO::PARAM_STR);
                $stmt->bindValue(':plant_name', $oil->plant_name, PDO::PARAM_STR);
                $stmt->bindValue(':extraction', $oil->extraction, PDO::PARAM_STR);
                $stmt->bindValue(':aroma', $oil->aroma, PDO::PARAM_STR);
                $stmt->bindValue(':caution', $oil->caution, PDO::PARAM_STR);
                $stmt->bindValue(':english_name', $oil->english_name, PDO::PARAM_STR);
                $stmt->bindValue(':user_id', $oil->user_id, PDO::PARAM_INT);
                $stmt->bindValue(':image', $oil->image, PDO::PARAM_STR);

                // INSERT文本番実行
                $stmt->execute();
                // 後処理
                self::close_connection($pdo, $stmt);
                return "新規エッセンシャルオイル登録が成功しました！";
            }catch(PDOException $e){
                //return 'PDO exception: ' . $e->getMessage();
                return $oil->name . 'は既に登録されています。';
            }
        }

        //効果IDが与えられた時、それに紐づいたオイル一覧を取得
        public static function get_all_oils_by_effect_id($effect_id){
            //例外処理
             try{
                // データベースに接続して万能の神様誕生
                $pdo = self::get_connection();
                // SELECT文の実行準備(:idは適当、不明確)
                $stmt = $pdo->prepare('SELECT * FROM relations WHERE effect_id=:effect_id');
                // バインド処理（あいまいだった値を具体的な値で穴埋めする）
                $stmt->bindValue(':effect_id', $effect_id, PDO::PARAM_INT);
                // SELECT文本番実行
                $stmt->execute();

                // Fetch ModeをOilクラスに設定
                $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Relation');
                // SELECT文の結果を relationクラスのインスタンスに格納
                $relations = $stmt->fetchAll();
                //var_dump($relations);
                
                //RelationsからOilsに詰め替え
                $oils = array();
                foreach($relations as $relation){
                    $oil = self::get_oil($relation->oil_id);
                    $oils[] = $oil;
                }
                //var_dump($oils);
                
            }catch(PDOException $e){
                
            }finally{
                // 後処理
                self::close_connection($pdo, $stmt);
            }
            // 完成したユーザー、はいあげる
            return $oils;  
        }
        public static function find($id){
            //例外処理
             try{
                // データベースに接続して万能の神様誕生
                $pdo = self::get_connection();
                // SELECT文の実行準備(:idは適当、不明確)
                $stmt = $pdo->prepare('SELECT * FROM essential_oils WHERE id=:id');
                // バインド処理（あいまいだった値を具体的な値で穴埋めする）
                $stmt->bindValue(':id', $id, PDO::PARAM_INT);
                // SELECT文本番実行
                $stmt->execute();

                // Fetch ModeをPostクラスに設定
                $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Oil');
                // SELECT文の結果を Postクラスのインスタンスに格納
                $oil = $stmt->fetch();
                
            }catch(PDOException $e){
                
            }finally{
                // 後処理
                self::close_connection($pdo, $stmt);
            }
            // 完成した、はい投稿あげる
            return $oil;  
        }
        
        // 画像ファイル名を取得するメソッド（uploadフォルダ内のファイルを物理削除するため）
        /*public static function get_image_name_by_id($id){
            try {
                $pdo = self::get_connection();
                $stmt = $pdo->prepare('SELECT * FROM essential_oils WHERE id = :id');
                // バインド処理
                $stmt->bindParam(':id', $id, PDO::PARAM_INT);
                // 実行
                $stmt->execute();
                // フェッチの結果を、oilクラスのインスタンスにマッピングする
                $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Oil');
                $oil = $stmt->fetch();
    
                self::close_connection($pdo, $stmt);
                    
                // 画像名を返す
                return $oil->image;
                
            } catch (PDOException $e) {
                return 'PDO exception: ' . $e->getMessage();
            }
        }*/

        //$idを指定して入力された情報に更新
        public static function update($oil, $id){
            //例外処理
             try{
                // データベースに接続して万能の神様誕生
                $pdo = self::get_connection();
                // UPDATE文の実行準備
                $stmt = $pdo->prepare('UPDATE essential_oils SET name=:name, scientific_name=:scientific_name, plant_name=:plant_name, extraction=:extraction, aroma=:aroma, caution=:caution, english_name=:english_name, user_id=:user_id, image=:image WHERE id = :id');

                // バインド処理（あいまいだった値を具体的な値で穴埋めする）
                $stmt->bindParam(':name', $oil->name, PDO::PARAM_STR);
                $stmt->bindParam(':scientific_name', $oil->scientific_name, PDO::PARAM_STR);
                $stmt->bindParam(':plant_name', $oil->plant_name, PDO::PARAM_STR);
                $stmt->bindParam(':extraction', $oil->extraction, PDO::PARAM_STR);
                $stmt->bindParam(':aroma', $oil->aroma, PDO::PARAM_STR);
                $stmt->bindParam(':caution', $oil->caution, PDO::PARAM_STR);
                $stmt->bindParam(':english_name', $oil->english_name, PDO::PARAM_STR);
                $stmt->bindParam(':user_id', $oil->user_id, PDO::PARAM_INT);
                $stmt->bindParam(':image', $oil->image, PDO::PARAM_STR);
                $stmt->bindParam(':id', $id, PDO::PARAM_INT);

                // update文本番実行
                $stmt->execute();
                self::close_connection($pdo, $stmt);
                
                //画像処理
                //if($image !== $oil->image){
                //    unlink('upload/' . $image);
                //}
                return '情報が更新されました！';

            } catch (PDOException $e) {
                return 'PDO exception: ' . $e->getMessage();
            }
        }
        
        // ファイルをアップロードするメソッド
        public static function upload(){
            
            // ファイル名をランダムに生成（ユニーク化）
            $image = uniqid(mt_rand(), true); 

            // アップロードされたファイルの拡張子を取得
            $image .= '.' . substr(strrchr($_FILES['image']['name'], '.'), 1);

            // 画像のフルパスを設定
            $file = 'upload/'  . $image;

            // uploadディレクトリにファイル保存
            move_uploaded_file($_FILES['image']['tmp_name'], $file);
            
            // 新しく作成された画像名を返す
            return $image;
        }
        
        //$idのユーザを削除する
        public static function delete($id){
            //例外処理
             try{
                // データベースに接続して万能の神様誕生
                $pdo = self::get_connection();
                // DELETE文の実行準備(:idは適当、不明確)
                $stmt = $pdo->prepare('DELETE FROM essential_oils WHERE id=:id');
                // バインド処理（あいまいだった値を具体的な値で穴埋めする）
                $stmt->bindValue(':id', $id, PDO::PARAM_INT);

                // DELETE文本番実行
                $stmt->execute();
                // 後処理
                self::close_connection($pdo, $stmt);
                
                unlink('upload/' . $image);

                
                return 'エッセンシャルオイル情報を削除しました。';

            }catch(PDOException $e){
                
            }finally{
            }
        }
        
        // オイルのキーワード検索を行うメソッド
        public static function search($keyword){
            //例外処理
             try{
                // データベースに接続して万能の神様誕生
                $pdo = self::get_connection();
                // SELECT文の実行準備(:idは適当、不明確)
                $stmt = $pdo->prepare('SELECT * FROM essential_oils WHERE name LIKE :name');
                // バインド処理（あいまいだった値を具体的な値で穴埋めする）
                $stmt->bindValue(':name', '%' . $keyword . '%', PDO::PARAM_STR);
                // SELECT文本番実行
                $stmt->execute();

                // Fetch ModeをPostクラスに設定
                $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Oil');
                // SELECT文の結果を Postクラスのインスタンス配列に格納
                $oils = $stmt->fetchAll();
                
            }catch(PDOException $e){
                
            }finally{
                // 後処理
                self::close_connection($pdo, $stmt);
            }
            // 完成した、はい投稿あげる
            return $oils;
        }
    }