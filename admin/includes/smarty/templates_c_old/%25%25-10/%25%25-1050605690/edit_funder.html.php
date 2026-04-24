<?php /* Smarty version 2.6.1, created on 2007-04-19 00:56:41
         compiled from edit_funder.html */ ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Flow Fund database - administration</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="style.css" rel="stylesheet" type="text/css">




</head>

<body bgcolor="#CCCCCC">
<table width="800" height="600" border="1" align="center" bgcolor="#FFFFFF">
  <tr>
    <td valign="top"> 
      <table width="100%" border="0" cellpadding="3" bgcolor="#336633">
        <tr> 
          <td width="87%" valign="top" class="head"><div align="center"> 
              <p class="header">Flow Fund Database - administration</p>
            </div></td>
        </tr>
        <tr> 
          <td width="87%" class="paragraph"><div align="center"> 
              <p class="header2"><?php echo $this->_tpl_vars['date']; ?>
</p>
            </div></td>
        </tr>
      </table>
      <table width="100%" border="0">
        <tr> 
          <td width="33%">&nbsp;</td>
          <td width="46%">&nbsp;</td>
          <td width="21%"><p align="center" class="inserttitle"><a href="change_password.php">user: 
              <?php echo $this->_tpl_vars['user']; ?>
</a><br>
              <a href="change_password.php">change password</a>| <a href="logout.php">logout</a> 
            </p>
            </td>
        </tr>
      </table>
      <div align="right" class="nav">
        <p align="left" class="paragraph">Editing record <?php echo $this->_tpl_vars['id']; ?>
</p>
        <form name="form1" method="post" action="update_funder.php">
          <table width="80%" border="0" align="center" cellspacing="5">
            <tr> 
              <td width="20%" class="formText">flow funder name</td>
              <td width="80%"><input name="flow_funder" type="text" class="form" id="flow_funder" value="<?php echo $this->_tpl_vars['flow_funder']; ?>
" size="50"></td>
            </tr>
            <tr> 
              <td height="16" colspan="2" class="formText">&nbsp;</td>
            </tr>
            <tr> 
              <td height="16" class="formText"><input name="Submit" type="submit" class="form" value="Update">
                <input name="id" type="hidden" id="id" value="<?php echo $this->_tpl_vars['id']; ?>
"></td>
              <td>&nbsp;</td>
            </tr>
          </table>
          <p class="paragraph">&nbsp;</p>
        </form>
        <p class="paragraph"><a href="view_funder.php">Return to list</a> without 
          saving changes</p>
      </div></td>
  </tr>
</table>
</body>
</html>