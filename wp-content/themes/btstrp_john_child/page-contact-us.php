
<style type="text/css">
.error{
  padding: 5px 9px;
  border: 1px solid red;
  color: red;
  border-radius: 3px;
}

.success{
  padding: 5px 9px;
  border: 1px solid green;
  color: green;
  border-radius: 3px;
}

form span{
  color: red;
}
</style>

<div id="respond">
<?php echo $response; ?>
<form action="<?php the_permalink(); ?>" method="post">
  <p><input type="text" placeholder="שם מלא" name="message_name" value="<?php echo esc_attr($_POST['message_name']); ?>"></label></p>
  <p><input type="email" placeholder="כתובת מייל" name="message_email" value="<?php echo esc_attr($_POST['message_email']); ?>"></label></p>
  <p><textarea type="text" placeholder="הודעה" name="message_text"><?php echo esc_textarea($_POST['message_text']); ?></textarea></label></p>
  <input type="hidden" name="submitted" value="1">
  <p><input type="submit"></p>
</form>
</div>