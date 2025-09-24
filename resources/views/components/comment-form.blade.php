<form method="POST" class="formWrapper">
    <div>
        <input type="submit" value="書き込む" name="submitButton" style="border: solid 1px black;">
        <label>名前：</label>
        <input type="text" name="username" value="" style="border: solid 1px black;">
        <input type="hidden" value="" name="threadID">
        <div>
            <textarea class="commentTextArea" name="body"></textarea>
        </div>
        <!-- 位置取得用 -->
        <input type="hidden" name="position" value="0">
    </div>
</form>