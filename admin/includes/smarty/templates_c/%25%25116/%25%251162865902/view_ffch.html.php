<?php /* Smarty version 2.6.1, created on 2010-02-15 20:18:51
         compiled from view_ffch.html */ ?>
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
        <p class="paragraph"><?php echo $this->_tpl_vars['total_ffch']; ?>
 records found.</p>
        <table width="100%" border="0" class="listings">
          <tr> 
            <td width="0" class="paragraph">&nbsp;</td>
            <td width="0" class="paragraph"><strong>FFCH name</strong></td>
            <td width="0"><strong>No. of associated projects</strong></td>
            <td width="0">&nbsp;</td>
            <td width="0">&nbsp;</td>
          </tr>
          <?php if (isset($this->_sections['ffch'])) unset($this->_sections['ffch']);
$this->_sections['ffch']['name'] = 'ffch';
$this->_sections['ffch']['loop'] = is_array($_loop=$this->_tpl_vars['id']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['ffch']['show'] = true;
$this->_sections['ffch']['max'] = $this->_sections['ffch']['loop'];
$this->_sections['ffch']['step'] = 1;
$this->_sections['ffch']['start'] = $this->_sections['ffch']['step'] > 0 ? 0 : $this->_sections['ffch']['loop']-1;
if ($this->_sections['ffch']['show']) {
    $this->_sections['ffch']['total'] = $this->_sections['ffch']['loop'];
    if ($this->_sections['ffch']['total'] == 0)
        $this->_sections['ffch']['show'] = false;
} else
    $this->_sections['ffch']['total'] = 0;
if ($this->_sections['ffch']['show']):

            for ($this->_sections['ffch']['index'] = $this->_sections['ffch']['start'], $this->_sections['ffch']['iteration'] = 1;
                 $this->_sections['ffch']['iteration'] <= $this->_sections['ffch']['total'];
                 $this->_sections['ffch']['index'] += $this->_sections['ffch']['step'], $this->_sections['ffch']['iteration']++):
$this->_sections['ffch']['rownum'] = $this->_sections['ffch']['iteration'];
$this->_sections['ffch']['index_prev'] = $this->_sections['ffch']['index'] - $this->_sections['ffch']['step'];
$this->_sections['ffch']['index_next'] = $this->_sections['ffch']['index'] + $this->_sections['ffch']['step'];
$this->_sections['ffch']['first']      = ($this->_sections['ffch']['iteration'] == 1);
$this->_sections['ffch']['last']       = ($this->_sections['ffch']['iteration'] == $this->_sections['ffch']['total']);
?> 
          <tr bgcolor="<?php echo $this->_tpl_vars['cell_bg'][$this->_sections['ffch']['index']]; ?>
" class="formText"> 
            <td width="0"><?php echo $this->_tpl_vars['id'][$this->_sections['ffch']['index']]; ?>
</td>
            <td width="0"><?php echo $this->_tpl_vars['ffch'][$this->_sections['ffch']['index']]; ?>
</td>
            <td width="0"><?php echo $this->_tpl_vars['no_projects'][$this->_sections['ffch']['index']]; ?>
</td>
            <td width="0"><a href="edit_ffch.php?id=<?php echo $this->_tpl_vars['id'][$this->_sections['ffch']['index']]; ?>
">edit</a></td>
            <td width="0"><a href="confirm_delete_ffch.php?id=<?php echo $this->_tpl_vars['id'][$this->_sections['ffch']['index']]; ?>
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