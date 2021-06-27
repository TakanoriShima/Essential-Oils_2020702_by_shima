<!DOCTYPE html>
<html lang="ja">
     <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <!-- ViewPort Setting -->
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <!-- Original CSS -->
        <link rel="stylesheet" href="css/style.css">
        <!-- Favicon -->
        <link rel="icon" href="images/favicon.ico">
        <title>Essential Oil Page</title>
        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <!-- Original JavaScript -->
        <script src="js/script.js"></script>
    </head>
    <body>
        <div class="header" style="background-image:url(images/top1.jpg)">
            <h1>Aroma Knowledge</h1>
        </div>
        <div class="essential_oils">
            <h2 class="title">Essential Oil</h1>
            <h2 class="subtitle"><?= $oil->name ?></h2>
            <?php if($flash_message !== null): ?>
            <p><?= $flash_message ?></p>
            <?php endif; ?>

            <div class="OilDetail">
                <img src="<?= 'upload/' . $oil->image ?>" style="max-width: 600px">
                <table class="table">
                    <tbody>
                        <tr>
                            <th style="width: 5%">名前</th>
                            <td style="width: 20%"><?= $oil->name ?></td>
                        </tr>
                        <tr>
                            <th>学名</th>
                            <td><?= $oil->scientific_name ?></td>
                        </tr>
                        <tr>
                            <th>科名</th>
                            <td><?= $oil->plant_name ?></td>
                        </tr>
                        <tr>
                            <th>抽出方法</th>
                            <td><?= $oil->extraction ?></td>
                        </tr>
                        <tr>
                            <th>香り</th>
                            <td><?= $oil->aroma ?></td>
                        </tr>
                        <tr>
                            <th>注意事項</th>
                            <td><?= $oil->caution ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <?php if($login_user->id === $oil->user_id): ?>
            <div class="row offset-md-5">
                <a href="oil_edit.php?id=<?= $id ?>" class="btn btn-outline-info col-sm-3">Edit</a>
                <form class="col-sm-6" action="oil_delete.php" method="POST">
                    <input type="hidden" name="id" value="<?= $id ?>">
                    <button type="submit" class="btn btn-outline-dark col-sm-7" onclick="return confirm('エッセンシャルオイル情報を削除します。よろしいですか？')">Delete</button>
                </form>
            </div>  
            <?php endif; ?>
        </div>
        <div class="effects">
            <h2 class="title">Effects</h3>
            <div class="EffectContent">
                <?php foreach($effects as $effect): ?>
                    <a href="effect_detail_for_user.php?id=<?= $effect->id ?>" class="EffectBtn"><?= $effect->effect ?></a>
                <?php endforeach; ?>
            </div>
            <?php if($login_user->id === $relation->user_id): ?>
            <p><a href="relation_edit.php?id=<?= $id ?>">編集</a></p>
            <?php endif; ?>
        </div>
        <div class="nav">
            <a href="mypage_top.php">Back to TOP</a><br>
            <a href="register_list.php">Go to Register List</a>
        </div>
        <div class="footer" style="background-image:url(images/footer.jpg)">
            <h1 class="logo">Aroma Knowledge</h1>
            <p class="copylight">COPYRIGHT © All rights Reserved.</p>
        </div>
        <!-- Original JavaScript -->
        <script src="js/script.js"></script>
    </body>
</html>