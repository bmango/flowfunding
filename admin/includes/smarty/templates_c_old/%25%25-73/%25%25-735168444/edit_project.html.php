<?php /* Smarty version 2.6.1, created on 2007-05-03 12:32:17
         compiled from edit_project.html */ ?>
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
        <form name="form1" method="post" action="update_project.php">
          <table width="80%" border="0" align="center" cellspacing="5">
            <tr> 
              <td width="20%" class="formText">ffch</td>
              <td width="80%"><?php echo $this->_tpl_vars['ffch_list']; ?>
</td>
            </tr>
            <tr> 
              <td class="formText">Project name</td>
              <td> <input name="project_name" type="text" class="form" id="project_name" value="<?php echo $this->_tpl_vars['project_name']; ?>
" size="50"></td>
            </tr>
            <tr> 
              <td class="formText">country 1</td>
              <td><?php echo $this->_tpl_vars['country1_list']; ?>
</td>
            </tr>
            <tr> 
              <td class="formText">country 2</td>
              <td><?php echo $this->_tpl_vars['country2_list']; ?>
</td>
            </tr>
            <tr>
              <td class="formText">country 3</td>
              <td><?php echo $this->_tpl_vars['country3_list']; ?>
</td>
            </tr>
            <tr> 
              <td class="formText">Project location</td>
              <td> <p> 
                  <input name="project_location" type="text" class="form" id="project_location" value="<?php echo $this->_tpl_vars['project_location']; ?>
" size="50">
                </p></td>
            </tr>
            <tr> 
              <td class="formText">Project description</td>
              <td> <textarea name="project_description" cols="50" rows="10" class="form" id="project_description"><?php echo $this->_tpl_vars['project_description']; ?>

</textarea></td>
            </tr>
            <tr> 
              <td class="formText">Websites</td>
              <td> <input name="website" type="text" class="form" id="website" value="<?php echo $this->_tpl_vars['website']; ?>
" size="80"></td>
            </tr>
            <tr> 
              <td class="formText">Flow Funder name</td>
              <td><?php echo $this->_tpl_vars['funder_name_list']; ?>
</td>
            </tr>
            <tr> 
              <td class="formText">Notes</td>
              <td> <textarea name="notes" cols="50" rows="10" class="form" id="notes"><?php echo $this->_tpl_vars['notes']; ?>
</textarea></td>
            </tr>
            <tr> 
              <td class="formText">Gift amount</td>
              <td> <span class="formText">$</span> <input name="gift_amount" type="text" class="form" id="gift_amount" value="<?php echo $this->_tpl_vars['gift_amount']; ?>
"></td>
            </tr>
            <tr> 
              <td height="16" class="formText">Category</td>
              <td>&nbsp;</td>
            </tr>
            <tr> 
              <td height="16" colspan="2" class="formText"><?php echo $this->_tpl_vars['org_types']; ?>
</td>
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
        <p class="paragraph"><a href="view_projects.php">Return to list</a> without 
          saving changes</p>
      </div></td>
  </tr>
</table>
</body>
</html>