<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
	<title></title>
</head>
<body>
<style>
	.join {
    display: inline;
}
.quit {
    display: none;
}
video {
    float left;
    margin: 10px;
    width: 300px;
}
</style>
<div>
    <input type="button" value="Join Conference" onclick="joinRoom();" class="join" \>
    <input type="button" value="Quit Conference" onclick="quitRoom();" class="quit" \>
</div>
<div class="video-container"></div>
</body>
<script src="/js/cam.js"></script>
</html>