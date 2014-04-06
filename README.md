Codeigniter-Template-Parser-Based-On-Tag
========================================

This repository is template parser based on tag like HTML for codeigniter. I call this as ciparser. Ciparser is designed for HMVC codeigniter. Easy to install and fast. What you need is only add ciparser into libraries of codeigniter.


INSTALLATION
============

First, you was install HMVC Codeigniter from https://github.com/jenssegers/CodeIgniter-HMVC-Modules. After that, install ciparser. Just download ciparser class and put it into your libraries codeigniter. Then call it with two ways:
1. Within controller, call this class with $this->load->library('ciparser');
2. From application/config/autoload.php file, call ciparser with $autoload['libraries'] = array('ciparser');


FUNCTIONALITY
=============

Create basic structure of HMVC Codeigniter like this

<pre>
<code>
/application
     /modules
           /module
                /controllers
                /models
                /views
                      exampleTargetViewModule.php
      /views
            exampleTemplate.php
</code>
</pre>

            
USAGE
=====

Inside your controller, add this code 

<pre><code>
$data["some_data"] = "any data";
$this->ciparser->new_parser("exampleTemplate",$data,"modules_module","exampleTargetViewModule");
</code></pre>

And inside your exampleTemplate.php add this code

<pre><code>
&lt;ci:doc type="modules"/&gt;
</code></pre>

value of type must exactly same with parent folder of module.


EXAMPLE
=======

You should to install HMVC Codeigniter first, then follow the instruction below:
<ol>
<li>Create a folder inside application folder of your codeigniter. Name it with "modules"</li>
<li>Inside application/modules folder, create a folder and name it with welcome.</li>
<li>Inside application/modules/welcome folder, create two folder each of them give name with "controllers" and "views".</li>
<li>Inside application/modules/welcome/controllers folder, create a php file then add this code

   <pre><code>
      <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Welcome extends CI_Controller {
	public function index()
	{
		$this->load->library(array('ciparser'));
		$this->ciparser->new_parse('template','', 'modules_welcome', 'welcome_message');
	}
}
   </code></pre>
   
   Save it with welcome.php</li>
<li>Inside modules/welcome/views folder, create a php file then add this code

  <pre><code>
	&lt;h1&gt;Welcome to CodeIgniter!&lt;/h1&gt;<br /> <br /> 	&lt;div id=&quot;body&quot;&gt;<br /> 		&lt;p&gt;The page you are looking at is being generated dynamically by CodeIgniter.&lt;/p&gt;<br /> <br /> 		&lt;p&gt;If you would like to edit this page you'll find it located at:&lt;/p&gt;<br /> 		&lt;code&gt;application/views/welcome_message.php&lt;/code&gt;<br /> <br /> 		&lt;p&gt;The corresponding controller for this page is found at:&lt;/p&gt;<br /> 		&lt;code&gt;application/controllers/welcome.php&lt;/code&gt;<br /> <br /> 		&lt;p&gt;If you are exploring CodeIgniter for the very first time, you should start by reading the &lt;a href=&quot;user_guide/&quot;&gt;User Guide&lt;/a&gt;.&lt;/p&gt;<br /> 	&lt;/div&gt;
	</code></pre>
  
   Save it with welcome_message.php</li>
<li>Inside application/views folder, create a php file then add this code 
  
   <pre><code>
&lt;!DOCTYPE html&gt;<br /> 
&lt;html lang=&quot;en&quot;&gt;<br /> 
&lt;head&gt;<br/>
        &lt;meta charset=&quot;utf-8&quot;&gt;<br /> 	&lt;title&gt;Welcome to CodeIgniter&lt;/title&gt;<br /> <br /> 	&lt;style type=&quot;text/css&quot;&gt;<br /> <br /> 	::selection{ background-color: #E13300; color: white; }<br /> 	::moz-selection{ background-color: #E13300; color: white; }<br /> 	::webkit-selection{ background-color: #E13300; color: white; }<br /> <br /> 	body {<br /> 		background-color: #fff;<br /> 		margin: 40px;<br /> 		font: 13px/20px normal Helvetica, Arial, sans-serif;<br /> 		color: #4F5155;<br /> 	}<br /> <br /> 	a {<br /> 		color: #003399;<br /> 		background-color: transparent;<br /> 		font-weight: normal;<br /> 	}<br /> <br /> 	h1 {<br /> 		color: #444;<br /> 		background-color: transparent;<br /> 		border-bottom: 1px solid #D0D0D0;<br /> 		font-size: 19px;<br /> 		font-weight: normal;<br /> 		margin: 0 0 14px 0;<br /> 		padding: 14px 15px 10px 15px;<br /> 	}<br /> <br /> 	code {<br /> 		font-family: Consolas, Monaco, Courier New, Courier, monospace;<br /> 		font-size: 12px;<br /> 		background-color: #f9f9f9;<br /> 		border: 1px solid #D0D0D0;<br /> 		color: #002166;<br /> 		display: block;<br /> 		margin: 14px 0 14px 0;<br /> 		padding: 12px 10px 12px 10px;<br /> 	}<br /> <br /> 	#body{<br /> 		margin: 0 15px 0 15px;<br /> 	}<br /> 	<br /> 	p.footer{<br /> 		text-align: right;<br /> 		font-size: 11px;<br /> 		border-top: 1px solid #D0D0D0;<br /> 		line-height: 32px;<br /> 		padding: 0 10px 0 10px;<br /> 		margin: 20px 0 0 0;<br /> 	}<br /> 	<br /> 	#container{<br /> 		margin: 10px;<br /> 		border: 1px solid #D0D0D0;<br /> 		-webkit-box-shadow: 0 0 8px #D0D0D0;<br /> 	}<br /> 	&lt;/style&gt;
&lt;/head&gt;<br/>
&lt;body&gt;<br /> <br /> &lt;div id=&quot;container&quot;&gt;<br /> 	&lt;p&gt;This is new parser tag for codeigniter&lt;/p&gt;<br /> 	<br /> 	&lt;ci:doc type=&quot;modules&quot;/&gt;<br /> 	<br /> 	&lt;p&gt;&lt;br /&gt;Page rendered in {elapsed_time} seconds&lt;/p&gt;<br /> <br /> &lt;/div&gt;<br /> <br /> &lt;/body&gt;
&lt;/html&gt;
   </code></pre>

   Save it with template.php</li>
</ol>

Now, run your project such as <pre><code>http://localhost/codeigniter/index.php/welcome</code></pre> from your browser.
