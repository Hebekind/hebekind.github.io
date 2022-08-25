<?php if (empty($wo['user'])) {
    header("Location: " . Wo_SeoLink('index.php?link1=welcome'));
    exit();
}
$webmasterid = 39503;
$password = 'EngAAaa2020';
$user = array(
    'username'=>$wo['user']['username'],
    'image'=>base64_encode($wo['user']['avatar']),
    'gender'=>$wo['user']['gender'],
    'role'=>($wo['user']['admin']==1)?'admin':'user',
    'password'=>$password
);
$encrypted = file_get_contents("https://html5-chat.com/protect/".base64_encode(json_encode($user)));
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Chat</title>
</head>
<body>
    <script src="https://html5-chat.com/script/<?=$webmasterid?>/<?=$encrypted?>"></script>
</body>
</html>
<?php exit();?>