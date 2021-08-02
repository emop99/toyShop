<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <script type="text/javascript" src="/smartEditor/js/service/HuskyEZCreator.js" charset="utf-8"></script>
</head>
<body>
<textarea name="testArea" style="width:100%" id="testArea"></textarea>
</body>
<script type="text/javascript">
    var oEditors = [];
    // oEditors.getById["testArea"].exec("UPDATE_CONTENTS_FIELD", []);	// 에디터의 내용이 textarea에 적용됩니다.
    nhn.husky.EZCreator.createInIFrame({
        oAppRef: oEditors,
        elPlaceHolder: "testArea",  // textarea ID
        sSkinURI: "/smartEditor/index.html",  // skin경로
        fCreator: "createSEditor2",
    });
</script>
</html>
