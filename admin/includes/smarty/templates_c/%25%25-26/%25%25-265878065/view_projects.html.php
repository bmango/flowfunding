<?php /* Smarty version 2.6.1, created on 2010-02-10 09:50:05
         compiled from view_projects.html */ ?>
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
          <td width="33%" class="paragraph"><strong><a href="menu.php">Main Menu</a></strong></td>
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
        <p class="paragraph"><?php echo $this->_tpl_vars['total_projects']; ?>
 records found.</p>
        <table width="100%" border="0" class="listings">
          <tr>
            <td width="0" class="paragraph">&nbsp;</td>
            <td width="0" class="paragraph"><strong>FFCH</strong></td>
            <td width="0"><strong>Project name</strong></td>
            <td width="0"><strong>Project location</strong></td>
            <td width="0"><strong>Gift amount</strong></td>
            <td width="0">&nbsp;</td>
            <td width="0">&nbsp;</td>
          </tr>
          <?php if (isset($this->_sections['projects'])) unset($this->_sections['projects']);
$this->_sections['projects']['name'] = 'projects';
$this->_sections['projects']['loop'] = is_array($_loop=$this->_tpl_vars['ffch']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['projects']['show'] = true;
$this->_sections['projects']['max'] = $this->_sections['projects']['loop'];
$this->_sections['projects']['step'] = 1;
$this->_sections['projects']['start'] = $this->_sections['projects']['step'] > 0 ? 0 : $this->_sections['projects']['loop']-1;
if ($this->_sections['projects']['show']) {
    $this->_sections['projects']['total'] = $this->_sections['projects']['loop'];
    if ($this->_sections['projects']['total'] == 0)
        $this->_sections['projects']['show'] = false;
} else
    $this->_sections['projects']['total'] = 0;
if ($this->_sections['projects']['show']):

            for ($this->_sections['projects']['index'] = $this->_sections['projects']['start'], $this->_sections['projects']['iteration'] = 1;
                 $this->_sections['projects']['iteration'] <= $this->_sections['projects']['total'];
                 $this->_sections['projects']['index'] += $this->_sections['projects']['step'], $this->_sections['projects']['iteration']++):
$this->_sections['projects']['rownum'] = $this->_sections['projects']['iteration'];
$this->_sections['projects']['index_prev'] = $this->_sections['projects']['index'] - $this->_sections['projects']['step'];
$this->_sections['projects']['index_next'] = $this->_sections['projects']['index'] + $this->_sections['projects']['step'];
$this->_sections['projects']['first']      = ($this->_sections['projects']['iteration'] == 1);
$this->_sections['projects']['last']       = ($this->_sections['projects']['iteration'] == $this->_sections['projects']['total']);
?> 
          <tr class="formText">
            <td width="0" bgcolor="<?php echo $this->_tpl_vars['cell_bg'][$this->_sections['projects']['index']]; ?>
"><?php echo $this->_tpl_vars['id'][$this->_sections['projects']['index']]; ?>
</td>
            <td width="0" bgcolor="<?php echo $this->_tpl_vars['cell_bg'][$this->_sections['projects']['index']]; ?>
"><?php echo $this->_tpl_vars['ffch'][$this->_sections['projects']['index']]; ?>
</td>
            <td width="0" bgcolor="<?php echo $this->_tpl_vars['cell_bg'][$this->_sections['projects']['index']]; ?>
"><?php echo $this->_tpl_vars['project_name'][$this->_sections['projects']['index']]; ?>
</td>
            <td width="0" bgcolor="<?php echo $this->_tpl_vars['cell_bg'][$this->_sections['projects']['index']]; ?>
"><?php echo $this->_tpl_vars['project_location'][$this->_sections['projects']['index']]; ?>
</td>
            <td width="0" bgcolor="<?php echo $this->_tpl_vars['cell_bg'][$this->_sections['projects']['index']]; ?>
">$<?php echo $this->_tpl_vars['gift_amount'][$this->_sections['projects']['index']]; ?>
</td>
            <td width="0" bgcolor="<?php echo $this->_tpl_vars['cell_bg'][$this->_sections['projects']['index']]; ?>
"><a href="edit_project.php?id=<?php echo $this->_tpl_vars['id'][$this->_sections['projects']['index']]; ?>
">edit</a></td>
            <td width="0" bgcolor="<?php echo $this->_tpl_vars['cell_bg'][$this->_sections['projects']['index']]; ?>
"><a href="confirm_delete_project.php?id=<?php echo $this->_tpl_vars['id'][$this->_sections['projects']['index']]; ?>
">delete</a></td>
          </tr>
          <?php endfor; endif; ?> 
        </table>
        <p class="paragraph">&nbsp;</p>
      </div></td>
  </tr>
</table>
</body>
</html>