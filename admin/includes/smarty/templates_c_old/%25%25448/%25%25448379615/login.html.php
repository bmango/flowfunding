<?php /* Smarty version 2.6.1, created on 2007-04-16 22:51:31
         compiled from login.html */ ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Flow Fund database - administration</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="style.css" rel="stylesheet" type="text/css">




</head>

<body bgcolor="#CCCCCC">
<table width="700" height="400" border="1" align="center" bgcolor="#FFFFFF">
  <tr>
    <td valign="top">
<table width="100%" border="0" cellpadding="3" bgcolor="#336633">
        <tr> 
          <td width="87%" valign="top" class="head"><div align="center">
              <p class="header">Flow Fund database - administration</p>
            </div></td>
        </tr>
        <tr> 
          <td width="87%" class="paragraph"><div align="center">
              <p class="header2">Please login</p>
            </div></td>
        </tr>
      </table>
      <p align="center" class="head">&nbsp;</p>
      <p align="center" class="loginError"><?php echo $this->_tpl_vars['error_message']; ?>
</p>
      <p class="head">&nbsp;</p>
      <form name="form1" method="post" action="process_login.php">
        <table width="236" border="1" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td width="232"><table width="232" border="0" align="center" cellpadding="2" cellspacing="2">
                <tr> 
                  <td width="85" class="formText">Username</td>
                  <td width="195"><input name="username" type="text" class="form" id="user3" value="<?php echo $this->_tpl_vars['username']; ?>
"></td>
                </tr>
                <tr> 
                  <td class="formText">Password</td>
                  <td><input name="password" type="password" class="form" id="password"></td>
                </tr>
                <tr>
                  <td class="formText">&nbsp;</td>
                  <td><input name="Submit" type="submit" class="form" value="Submit"></td>
                </tr>
              </table></td>
          </tr>
        </table>
        <p>&nbsp;</p></form>
    </td>
  </tr>
</table>
</body>
</html>