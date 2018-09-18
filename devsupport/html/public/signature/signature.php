<?php 
  $generate = 0;
  if($_POST)
  {
    $submit = $_POST['submit'];

    if(! $submit )
    {
      header("LOCATON: 404.html");
      exit();
    }
    else
    {
      $fname = $_POST['fname'];
      $position = $_POST['position'];
      $wechatid = $_POST['wechatid'];
      $skypeid = $_POST['skypeid'];
      $mobileid = $_POST['mobileid'];
      $mobileid2 = $_POST['mobileid2'];
      $mobileid3 = $_POST['mobileid3'];

      if(!$fname)
      {
        $errormsg = "Please fill up Name!";
      }
      elseif(!$position)
      {
        $errormsg = "Please fill up Position!";
      }
      elseif(!$wechatid)
      {
        $errormsg = "Please fill up Wechat Id!";
      }
      elseif(!$skypeid)
      {
        $errormsg = "Please fill up Skype Id!";
      }
      else
      {
        $generate = 1;
      }
    }
  }
?>
<?php include "header.php"; ?>
<div class="br-line"></div>
<?php if($generate == 0): ?>
<div class="form-section">
  <form method="POST" action="signature.php">
    <table>
      <tr>
        <td>Name: </td>
        <td>
          <input class="input_text" type="text" name="fname" value="<?php echo isset($fname) ? $fname : ""; ?>" />
        </td>
      </tr>
      <tr>
        <td>Position: </td>
        <td>
          <input class="input_text" type="text" name="position" value="<?php echo isset($position) ? $position : ""; ?>" />
        </td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>WeChat: </td>
        <td>
          <input class="input_text" type="text" name="wechatid" value="<?php echo isset($wechatid) ? $wechatid : ""; ?>" />
        </td>
      </tr>
      <tr>
        <td>Skype: </td>
        <td>
          <input class="input_text" type="text" name="skypeid" value="<?php echo isset($skypeid) ? $skypeid : ""; ?>" />
        </td>
      </tr>
      <tr>
        <td>Mobile</td>
        <td>
          <input class="input_number" type="text" placeholder="917" maxlength="3" name="mobileid" value="<?php echo isset($mobileid) ? $mobileid : ""; ?>" />
          <input class="input_number" type="text" placeholder="XXX" maxlength="3" name="mobileid2" value="<?php echo isset($mobileid2) ? $mobileid2 : ""; ?>" />
          <input class="input_number" type="text" placeholder="XXXX" maxlength="4" name="mobileid3" value="<?php echo isset($mobileid3) ? $mobileid3 : ""; ?>"  />
        </td>
      </tr>
      <tr>
        <td colspan="2">
          <div style="color:red;">
              <?php echo isset($errormsg) ? $errormsg :""; ?>
              <?php
                if(isset($_GET['success'])){
                  echo "<span style='color:green;'>".$_GET['success']."</span>";
                }
              ?>
            </div>
        </td>
      </tr>
    </table>
    <div class="btn-section">
      <input type="submit" name="submit" class="btn-gen" value="Generate" />
    </div>
  </form>
</div>
<?php elseif($generate == 1): ?>
<div id="signature_gen" class="signature_gen">
  <p>
  <table width="482" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td width="129" rowspan="3" align="center" valign="middle"><a href="http://mypage.51talk.com/mypage/phweb/page/index/"><img src="images/logo.png" alt="" width="114" height="114" /></a></td>
      <td width="2" rowspan="3" bgcolor="#999999"></td>
      <td colspan="8" align="left" valign="top"></td>
    </tr>
    <tr>
      <td height="76" colspan="8" align="left" valign="top">
        <table width="340" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="10"></td>
            <td width="269">
            <div class="fonttype">
              <b><?php echo $fname; ?></b>
              <br />
              <?php echo $position; ?>
              <br />
              <br />
              WeChat: <?php echo $wechatid; ?> | Skype: <?php echo $skypeid; ?> 
              <br />
              <?php if(!$mobileid && !$mobileid2 && !$mobileid3): ?>
              <?php else: ?>
                Mobile No.: +<?php echo $mobileid; ?> <?php echo $mobileid2; ?> <?php echo $mobileid3; ?> 
              <?php endif; ?>
            </div>
            </td>
            <td width="10"></td>
          </tr>
          <tr>
          <td height="10" colspan="10"></td>
        </tr>
        </table>
      </td>
    </tr>
    <tr>
      <td width="18"></td>
      <td width="29"><a href="https://www.facebook.com/51talk/"><img src="images/fb.png" width="29" height="29" /></a></td>
      <td width="6"></td>
      <td width="29"><a href="https://www.linkedin.com/company-beta/3017837/"><img src="images/in.png" width="29" height="29" /></a></td>
      <td width="6"></td>
      <td width="29"><a href="https://twitter.com/51TalkPH"><img src="images/tw.png" width="29" height="29" /></a></td>
      <td width="6"></td>
      <td width="198"><a href="https://www.instagram.com/51talkph/"><img src="images/insta.png" width="30" height="30" /></a></td>
    </tr>
    <tr>
      <td colspan="10" align="center" valign="middle"><p class="footer">51Talk,an NYSE listed company, is a leading  online English teaching platform in the world.</p></td>
    </tr>
  </table>
  </p>
</div>
<div class="instuction">
  <table style="width: 100%;">
    <tr>
      <td>
        Click <a href="file/Email Signature Generator.pdf" target="_new">here</a> for instruction
      </td>
      <td align="right">
           <a href="index.php"><input type="submit" name="submit" class="btn-copy" value="Cancel" /></a>
      </td>
    </tr>
  </table>
    
</div>
<!--
<div class="btn-section">
    <input type="submit" name="submit" class="btn-copy" onclick="copyToClipboard('signature_gen')" value="Copy Signature" />
</div>
-->
<?php endif; ?>
<?php include "footer.php"; ?>
<script type="text/javascript">
/*
function copyToClipboard(elementId) {


  var aux = document.createElement("input");
  aux.setAttribute("value", document.getElementById(elementId).innerHTML);
  document.body.appendChild(aux);
  aux.select();
  document.execCommand("copy");

  document.body.removeChild(aux);

}
*/
</script>