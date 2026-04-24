<?php /* Smarty version 2.6.1, created on 2010-04-23 17:32:34
         compiled from add_project.html */ ?>
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
        <p align="left" class="paragraph">Adding new project</p>
        <form name="form1" method="post" action="insert_project.php">
          <table width="80%" border="0" align="center" cellspacing="5">
            <tr> 
              <td width="20%" class="formText">FFCH</td>
              <td width="80%"><?php echo $this->_tpl_vars['ffch_list']; ?>
</td>
            </tr>
            <tr> 
              <td class="formText">Display FFCH</td>
              <td> <input name="display_ffch" type="checkbox" class="form" id="display_ffch" value="1" /></td>
            </tr>            
            <tr> 
              <td class="formText">Project name</td>
              <td> 
                <input name="project_name" type="text" class="form" id="project_name" size="50"></td>
            </tr>
            <tr> 
              <td class="formText">Project location</td>
              <td> 
                <p> 
                  <input name="project_location" type="text" class="form" id="project_location" size="50">
                </p></td>
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
              <td class="formText">Project description</td>
              <td> 
                <textarea name="project_description" cols="50" rows="10" class="form" id="project_description"></textarea></td>
            </tr>
            <tr> 
              <td class="formText">Image File Name</td>
              <td> <input name="image_file_name" type="text" class="form" id="image_file_name" value="<?php echo $this->_tpl_vars['image_file_name']; ?>
" size="50"></td>
            </tr>
            <tr> 
              <td class="formText">YouTube Code</td>
              <td> <input name="youtube_code" type="text" class="form" id="youtube_code" value="<?php echo $this->_tpl_vars['youtube_code']; ?>
" size="20"></td>
            </tr>            
            <tr> 
              <td class="formText">Website</td>
              <td> 
                <input name="website" type="text" class="form" id="website" size="50"></td>
            </tr>
            <tr> 
              <td class="formText">Flow Funder name</td>
              <td><?php echo $this->_tpl_vars['funder_name_list']; ?>
</td>
            </tr>
            <tr> 
              <td class="formText">Display Flow Funder</td>
              <td> <input name="display_funder" type="checkbox" class="form" id="display_funder" value="1" /></td>
            </tr> 
            <tr> 
              <td class="formText">Notes</td>
              <td>
<textarea name="notes" cols="50" rows="10" class="form" id="notes"></textarea></td>
            </tr>
            <tr> 
              <td class="formText">Gift amount</td>
              <td> <span class="formText">$</span>
<input name="gift_amount" type="text" class="form" id="gift_amount"></td>
            </tr>
            <tr> 
              <td class="formText">Year Funded</td>
              <td> 
                <input name="year_funded" type="text" class="form" id="year_funded" size="6">
              </td>
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
              <td height="16" class="formText"><input name="Submit" type="submit" class="form" value="Insert">
              </td>
              <td>&nbsp;</td>
            </tr>
          </table>
          <p class="paragraph">&nbsp;</p>
        </form>
        <p align="left" class="paragraph"><a href="view_projects.php">Return to 
          list</a> without saving changes</p>
      </div></td>
  </tr>
</table>
</body>
</html>