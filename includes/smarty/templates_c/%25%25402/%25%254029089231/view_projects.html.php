<?php /* Smarty version 2.6.1, created on 2011-10-05 02:56:47
         compiled from view_projects.html */ ?>
<?php require_once(SMARTY_DIR . 'core' . DIRECTORY_SEPARATOR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'view_projects.html', 114, false),)), $this); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
        "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en"><!-- InstanceBegin template="/Templates/basic.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<!-- InstanceBeginEditable name="doctitle" -->
<title>Flow Funding</title>
<!-- InstanceEndEditable -->
<link type="text/css" href="../../../css/base.css" rel="stylesheet" />
<link type="text/css" href="../../../css/flow.css" rel="stylesheet" />
<link type="text/css" href="../../../css/print.css" rel="stylesheet" media="print" />

<!--[if lte IE 6]>
	<link type="text/css" href="../../../css/ie6.css" rel="stylesheet" />	
	<![endif]-->
<script type="text/javascript" src="../../../js/jquery-1.1.3.1.pack.js"></script>
<script type="text/javascript" src="../../../js/iutil.js"></script>
<script type="text/javascript" src="../../../js/ifx.js"></script>
<script type="text/javascript" src="../../../js/ifxscrollto.js"></script>
<script type="text/javascript" src="../../../js/flow.js"></script>
<script type="text/javascript" src="../../../js/ibox/ibox.js"></script>

<!-- InstanceBeginEditable name="head" --><!-- InstanceEndEditable --><!-- InstanceParam name="Page Location Name" type="text" value="action" --><!-- InstanceParam name="IE stylesheet" type="URL" value="../../../css/ie6.css" -->
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>

<body class="action">
<div id="wrap">
  <div id="header">
		<h1><img src="../../../images/logo.png" height="144" width="398" alt="Flow Funding" /></h1>
		<p>
		<!-- InstanceBeginEditable name="Header Image" -->
		<img src="../../../images/flow.jpg" width="700" height="116" alt="" />		
		<!-- InstanceEndEditable -->		
		</p>
	</div>
	<div id="content">
	  <div id="copy">
		  <h2><a name="top"><!-- InstanceBeginEditable name="Page Header" -->Where Did the Money Flow?<!-- InstanceEndEditable --></a></h2>
			
		  <!-- InstanceBeginEditable name="Page Content" -->
		  <h3>Your search for <strong><?php echo $this->_tpl_vars['requested_org']; ?>
</strong> found <strong><?php echo $this->_tpl_vars['total_records']; ?>
</strong> result(s)</h3>
		  <form name="form1" method="post" action="view_project.php">
			<p>Limited by country<br />
			<?php echo $this->_tpl_vars['country_list']; ?>
 <input name="submit" type="submit" id="submit" value="Go" /></p>
		  </form>
		  <?php if (isset($this->_sections['projects'])) unset($this->_sections['projects']);
$this->_sections['projects']['name'] = 'projects';
$this->_sections['projects']['loop'] = is_array($_loop=$this->_tpl_vars['id']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
		  <div class="project_wrapper">
		  <h4><?php echo $this->_tpl_vars['project_name'][$this->_sections['projects']['index']]; ?>
 <sup>(<?php echo $this->_tpl_vars['id'][$this->_sections['projects']['index']]; ?>
)</sup></h4>
		  
		  <?php if (! empty ( $this->_tpl_vars['website'][$this->_sections['projects']['index']] )): ?><p class="website"><?php echo $this->_tpl_vars['website'][$this->_sections['projects']['index']]; ?>
</p><?php endif; ?>
		  
		  <p class="country"><?php echo $this->_tpl_vars['country'][$this->_sections['projects']['index']]; ?>
 / $<?php echo $this->_tpl_vars['gift_amount'][$this->_sections['projects']['index']]; ?>
</p>
		  
		  <?php if (! empty ( $this->_tpl_vars['ffch_name'][$this->_sections['projects']['index']] )): ?><p class="ffch_name">FFCH: <?php echo $this->_tpl_vars['ffch_name'][$this->_sections['projects']['index']]; ?>
</p><?php endif; ?>
		  <?php if (! empty ( $this->_tpl_vars['funder_name'][$this->_sections['projects']['index']] )): ?><p class="funder_name">Flow Funder: <?php echo $this->_tpl_vars['funder_name'][$this->_sections['projects']['index']]; ?>
</p><?php endif; ?>
		  
		  <?php if (! empty ( $this->_tpl_vars['year_funded'][$this->_sections['projects']['index']] )): ?><p class="year_funded">Year Funded: <?php echo $this->_tpl_vars['year_funded'][$this->_sections['projects']['index']]; ?>
</p><?php endif; ?>		  
		  	  
		  <?php if (! empty ( $this->_tpl_vars['image'][$this->_sections['projects']['index']] )): ?>
		  <?php echo $this->_tpl_vars['image'][$this->_sections['projects']['index']]; ?>

		  <?php endif; ?>
		  
		  <?php if (! empty ( $this->_tpl_vars['youtube_image_link'][$this->_sections['projects']['index']] )): ?>
		  <div class="video_area">
		  	<p>Please click the image to view the video.</p>
		  	<?php echo $this->_tpl_vars['youtube_image_link'][$this->_sections['projects']['index']]; ?>

		  </div>
		  <?php endif; ?>
		  
		  <p class="description"><?php echo $this->_tpl_vars['project_description'][$this->_sections['projects']['index']]; ?>
</p>
		  
		  <p class="categories"><?php echo $this->_tpl_vars['categories'][$this->_sections['projects']['index']]; ?>
</p>
		  <!-- <p></p> -->
		  
		  <p class="back_to_top"><a href="#top">Back to Top</a></p>
		  </div> <!-- /.project_wrapper -->
		  <?php endfor; endif; ?>
		  <!-- InstanceEndEditable -->
      </div>
			
			<div id="navigation">
                <ul>
                  <li class="about"><a href="../../../about/whatisit.html">About Flow Funding</a>
                      <ul>
                        <li><a href="../../../about/whatisit.html">What is it?</a></li>
                        <li><a href="../../../about/whydoit.html">Why do it?</a></li>
                        <li><a href="../../../about/isiteffective.html">Is it effective?</a></li>
                        <li><a href="../../../about/howtogetstarted.html">How to Get Started</a></li>
                        <li><a href="../../../about/fundingguidelines.html">Funding Guidlelines</a></li>
                        <li><a href="../../../about/report.html">Reports</a></li>                      
                        <li><a href="../../../about/foundations.html">Foundations</a></li>                      
                        <li><a href="../../../about/faqs.html">Frequently Asked Questions</a></li>                      
                      </ul>
                  </li>
                  <li class="circles"><a href="../../../circle/mission.html">The Flow Fund Circle</a>
                      <ul>
                        <li><a href="../../../circle/mission.html">Mission and History</a></li>
                        <li><a href="../../../circle/structure.html">Structure</a></li>
                        <li><a href="../../../circle/whoareflowfunders.html">Who are the Flow Funders?</a></li>
						<li><a href="../../../circle/moneyflow.html">Where has the money flowed?</a></li>
                      </ul>
                  </li>
                  <li class="future"><a href="../../../future/transforming.html">Philanthropy of the Future</a>
                      <ul>
                        <li><a href="../../../future/transforming.html">Transforming philanthropy</a></li>
                        <li><a href="../../../future/visions.html">Visions of the Philanthropy of the Future</a></li>
                        <li><a href="../../../future/examples.html">Examples of other Flow Funds</a></li>
                        <li><a href="../../../future/resources.html">Resources</a></li>
                      </ul>
                  </li>
                  <!-- <li class="action"><a href="../../../action/index.php">Where Did  the Money Flow?</a> -->
				  <ul>
					<?php if (isset($this->_sections['org_table'])) unset($this->_sections['org_table']);
$this->_sections['org_table']['name'] = 'org_table';
$this->_sections['org_table']['loop'] = is_array($_loop=$this->_tpl_vars['org_id']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['org_table']['show'] = true;
$this->_sections['org_table']['max'] = $this->_sections['org_table']['loop'];
$this->_sections['org_table']['step'] = 1;
$this->_sections['org_table']['start'] = $this->_sections['org_table']['step'] > 0 ? 0 : $this->_sections['org_table']['loop']-1;
if ($this->_sections['org_table']['show']) {
    $this->_sections['org_table']['total'] = $this->_sections['org_table']['loop'];
    if ($this->_sections['org_table']['total'] == 0)
        $this->_sections['org_table']['show'] = false;
} else
    $this->_sections['org_table']['total'] = 0;
if ($this->_sections['org_table']['show']):

            for ($this->_sections['org_table']['index'] = $this->_sections['org_table']['start'], $this->_sections['org_table']['iteration'] = 1;
                 $this->_sections['org_table']['iteration'] <= $this->_sections['org_table']['total'];
                 $this->_sections['org_table']['index'] += $this->_sections['org_table']['step'], $this->_sections['org_table']['iteration']++):
$this->_sections['org_table']['rownum'] = $this->_sections['org_table']['iteration'];
$this->_sections['org_table']['index_prev'] = $this->_sections['org_table']['index'] - $this->_sections['org_table']['step'];
$this->_sections['org_table']['index_next'] = $this->_sections['org_table']['index'] + $this->_sections['org_table']['step'];
$this->_sections['org_table']['first']      = ($this->_sections['org_table']['iteration'] == 1);
$this->_sections['org_table']['last']       = ($this->_sections['org_table']['iteration'] == $this->_sections['org_table']['total']);
?> <li class="<?php echo smarty_function_cycle(array('values' => "odd,even"), $this);?>"><a href="view_project.php?type=<?php echo $this->_tpl_vars['org_types'][$this->_sections['org_table']['index']]; ?>"><?php echo $this->_tpl_vars['org_types'][$this->_sections['org_table']['index']]; ?></a></li> <?php endfor; endif; ?> 
				</ul>
                  </li>
                </ul>
                <!-- InstanceBeginEditable name="Side Image" --><!-- InstanceEndEditable -->
                <p id="homelink"><a href="../../../index.html">HOME</a></p>
	  </div>
	</div>
</div>
</body>
<!-- InstanceEnd --></html>