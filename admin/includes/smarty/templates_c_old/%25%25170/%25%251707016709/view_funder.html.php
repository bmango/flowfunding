<?php /* Smarty version 2.6.1, created on 2007-04-16 22:51:15
         compiled from view_funder.html */ ?>
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
        <p class="paragraph"><?php echo $this->_tpl_vars['total_funders']; ?>
 records found.</p>
        <table width="100%" border="0" class="listings">
          <tr> 
            <td width="0" class="paragraph">&nbsp;</td>
            <td width="0" class="paragraph"><strong>Funder name</strong></td>
            <td width="0"><strong>No. of associated projects</strong></td>
            <td width="0">&nbsp;</td>
            <td width="0">&nbsp;</td>
          </tr>
          <?php if (isset($this->_sections['flow_funder'])) unset($this->_sections['flow_funder']);
$this->_sections['flow_funder']['name'] = 'flow_funder';
$this->_sections['flow_funder']['loop'] = is_array($_loop=$this->_tpl_vars['id']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['flow_funder']['show'] = true;
$this->_sections['flow_funder']['max'] = $this->_sections['flow_funder']['loop'];
$this->_sections['flow_funder']['step'] = 1;
$this->_sections['flow_funder']['start'] = $this->_sections['flow_funder']['step'] > 0 ? 0 : $this->_sections['flow_funder']['loop']-1;
if ($this->_sections['flow_funder']['show']) {
    $this->_sections['flow_funder']['total'] = $this->_sections['flow_funder']['loop'];
    if ($this->_sections['flow_funder']['total'] == 0)
        $this->_sections['flow_funder']['show'] = false;
} else
    $this->_sections['flow_funder']['total'] = 0;
if ($this->_sections['flow_funder']['show']):

            for ($this->_sections['flow_funder']['index'] = $this->_sections['flow_funder']['start'], $this->_sections['flow_funder']['iteration'] = 1;
                 $this->_sections['flow_funder']['iteration'] <= $this->_sections['flow_funder']['total'];
                 $this->_sections['flow_funder']['index'] += $this->_sections['flow_funder']['step'], $this->_sections['flow_funder']['iteration']++):
$this->_sections['flow_funder']['rownum'] = $this->_sections['flow_funder']['iteration'];
$this->_sections['flow_funder']['index_prev'] = $this->_sections['flow_funder']['index'] - $this->_sections['flow_funder']['step'];
$this->_sections['flow_funder']['index_next'] = $this->_sections['flow_funder']['index'] + $this->_sections['flow_funder']['step'];
$this->_sections['flow_funder']['first']      = ($this->_sections['flow_funder']['iteration'] == 1);
$this->_sections['flow_funder']['last']       = ($this->_sections['flow_funder']['iteration'] == $this->_sections['flow_funder']['total']);
?> 
          <tr bgcolor="<?php echo $this->_tpl_vars['cell_bg'][$this->_sections['flow_funder']['index']]; ?>
" class="formText"> 
            <td width="0"><?php echo $this->_tpl_vars['id'][$this->_sections['flow_funder']['index']]; ?>
</td>
            <td width="0"><?php echo $this->_tpl_vars['flow_funder'][$this->_sections['flow_funder']['index']]; ?>
</td>
            <td width="0"><?php echo $this->_tpl_vars['no_projects'][$this->_sections['flow_funder']['index']]; ?>
</td>
            <td width="0"><a href="edit_funder.php?id=<?php echo $this->_tpl_vars['id'][$this->_sections['flow_funder']['index']]; ?>
">edit</a></td>
            <td width="0"><a href="confirm_delete_funder.php?id=<?php echo $this->_tpl_vars['id'][$this->_sections['flow_funder']['index']]; ?>
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