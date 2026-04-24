<?php /* Smarty version 2.6.1, created on 2006-05-07 22:33:45
         compiled from edit.html */ ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Caf&eacute; Green - Edit site</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="style.css" rel="stylesheet" type="text/css">




</head>

<body bgcolor="#CCCCCC">
<table width="800" height="600" border="1" align="center" bgcolor="#FFFFFF">
  <tr>
    <td valign="top"> <table width="100%" border="0" cellpadding="3" bgcolor="#336633">
        <tr> 
          <td width="87%" valign="top" class="head"><div align="center"> 
              <p class="header">Caf&eacute; Green - website administration</p>
            </div></td>
        </tr>
        <tr> 
          <td width="87%" class="paragraph"><div align="center"> 
              <p class="header2"><?php echo $this->_tpl_vars['user']; ?>
 :: <?php echo $this->_tpl_vars['date']; ?>
</p>
            </div></td>
        </tr>
      </table>
      <p align="right" class="inserttitle"> <a href="change_password.php">change 
        password</a>| <a href="logout.php">logout</a></p>
      <form action="update.php" method="post" enctype="multipart/form-data" name="form1">
        <table width="100%" border="0" cellpadding="5" class="formText">
          <tr> 
            <td width="109" nowrap class="formText">Main head</td>
            <td width="200"><input name="main_head" type="text" class="form" id="main_head" value="<?php echo $this->_tpl_vars['main_head']; ?>
" size="40"></td>
            <td width="359">&nbsp;</td>
          </tr>
          <tr> 
            <td nowrap class="formText">Main text</td>
            <td><textarea name="main_text" cols="40" rows="5" class="form" id="main_text"><?php echo $this->_tpl_vars['main_text']; ?>
</textarea></td>
            <td>&nbsp;</td>
          </tr>
        </table>
        <p>&nbsp;</p>
        <table width="100%" border="1" cellpadding="4" cellspacing="0">
          <tr bordercolor="#FFFFFF"> 
            <td colspan="3" class="sectionHead">1</td>
          </tr>
          <tr bordercolor="#FFFFFF"> 
            <td width="17%" class="formText">Head</td>
            <td width="65%"> <input name="header1" type="text" class="form" id="header2" value="<?php echo $this->_tpl_vars['header1']; ?>
" size="40"></td>
            <td width="18%" rowspan="3" valign="top"><img src="<?php echo $this->_tpl_vars['image1']; ?>
" alt="Image1" width="250" height="350" border="1"></td>
          </tr>
          <tr bordercolor="#FFFFFF"> 
            <td class="formText">Text</td>
            <td> <textarea name="text1" cols="40" rows="5" class="form" id="textarea5"><?php echo $this->_tpl_vars['text1']; ?>
</textarea></td>
          </tr>
          <tr bordercolor="#FFFFFF"> 
            <td valign="top" nowrap class="formText">Change image</td>
            <td valign="top"> 
              <p>
                <input name="image1" type="file" class="form" id="image2" size="50">
              </p>
              <p class="formText">Image dimensions must be:</p>
              <p class="formText">width: 250 pixels<br>
                height: 350 pixels</p></td>
          </tr>
        </table>
        <p>&nbsp;</p>
        <table width="100%" border="1" cellpadding="4" cellspacing="0">
          <tr bordercolor="#FFFFFF"> 
            <td colspan="3" class="sectionHead">2</td>
          </tr>
          <tr bordercolor="#FFFFFF"> 
            <td width="17%" class="formText">Head</td>
            <td width="65%"> <input name="header2" type="text" class="form" id="header13" value="<?php echo $this->_tpl_vars['header2']; ?>
" size="40"></td>
            <td width="18%" rowspan="3" valign="top"><img src="<?php echo $this->_tpl_vars['image2']; ?>
" alt="Image2" width="250" height="350" border="1"></td>
          </tr>
          <tr bordercolor="#FFFFFF"> 
            <td class="formText">Text</td>
            <td> <textarea name="text2" cols="40" rows="5" class="form" id="textarea3"><?php echo $this->_tpl_vars['text2']; ?>
</textarea></td>
          </tr>
          <tr bordercolor="#FFFFFF"> 
            <td valign="top" nowrap class="formText">Change image</td>
            <td valign="top"> 
              <p>
                <input name="image2" type="file" class="form" id="thumbnail3" size="50">
              </p>
              <p class="formText">Image dimensions must be:</p>
              <p class="formText">width: 250 pixels<br>
                height: 350 pixels</p>
              <p>&nbsp; </p></td>
          </tr>
        </table>
        <p>&nbsp;</p>
        <table width="100%" border="1" cellpadding="4" cellspacing="0">
          <tr bordercolor="#FFFFFF"> 
            <td colspan="3" class="sectionHead">3</td>
          </tr>
          <tr bordercolor="#FFFFFF"> 
            <td width="17%" nowrap class="formText">Head</td>
            <td width="65%"> <input name="header3" type="text" class="form" id="header22" value="<?php echo $this->_tpl_vars['header3']; ?>
" size="40"></td>
            <td width="18%" rowspan="3" valign="top"><img src="<?php echo $this->_tpl_vars['image3']; ?>
" alt="Image3" width="250" height="350" border="1"></td>
          </tr>
          <tr bordercolor="#FFFFFF"> 
            <td nowrap class="formText">Text</td>
            <td> <textarea name="text3" cols="40" rows="5" class="form" id="textarea6"><?php echo $this->_tpl_vars['text3']; ?>
</textarea></td>
          </tr>
          <tr bordercolor="#FFFFFF"> 
            <td valign="top" nowrap class="formText">Change image</td>
            <td valign="top"> 
              <p>
                <input name="image3" type="file" class="form" id="image22" size="50">
              </p>
              <p class="formText">Image dimensions must be:</p>
              <p class="formText">width: 250 pixels<br>
                height: 350 pixels</p>
              <p>&nbsp; </p></td>
          </tr>
        </table>
        <p>HTML tags should be used for formatting:</p>
        <p> &lt;BR&gt; for a new line<br>
          &lt;P&gt; for a new paragraph<br>
          &lt;STRONG&gt;bold text here&lt;/STRONG&gt;</p>
        <p>&nbsp;</p>
        <p>
          <input name="Submit" type="submit" class="form" value="Update">
        </p>
      </form>
      <div align="right" class="nav">
        <p class="inserttitle"><a href="logout.php">logout </a></p>
      </div></td>
  </tr>
</table>
</body>
</html>