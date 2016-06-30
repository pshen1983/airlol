<div>
<div id="msg_history_div">
</div>
<form>
<input type="hidden" name="gid" value="<?=$params['msg_good'] ?>" />
<input type="hidden" name="tid" value="<?=$params['msg_trip'] ?>" />
<input type="hidden" name="context" value="<?=$params['msg_to_type'] ?>" />
<textarea name="msg"></textarea>
<button type="button" class="msg_send_btn btn"><?=View::$params['btn_send_message'] ?></button>
</form>
</div>