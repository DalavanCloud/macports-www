<?php
    /* -*- coding: utf-8; mode: php; tab-width: 4; indent-tabs-mode: nil; c-basic-offset: 4 -*- vim:fenc=utf-8:filetype=php:et:sw=4:ts=4:sts=4 */
    /* $Id$ */
    /* Copyright (c) 2004-2007, MacPorts Organization */
    /* Copyright (c) 2004, OpenDarwin */
    $MPWEB = $_SERVER['DOCUMENT_ROOT'] . dirname($_SERVER['SCRIPT_NAME']);
    include_once("$MPWEB/includes/common.inc");
    print_header('MacPorts -- Download &amp; Installation', 'utf-8');
?>


<div id="content">

    <h2 class="hdr">Installing MacPorts</h2>

    <p>MacPorts version <?php print $mp_version_major; ?> is available in binary form as dmg disk images for <a
    href="<?php print $tiger_dmg; ?>"> Tiger (Universal)</a> and <a href="<?php print $panther_dmg; ?>"> Panther (PowerPC)</a>,
    both containing a pkg installer, or in source form as either a <a href="<?php print $bz2_tarball ?>">tar.bz2</a>
    package or a <a href="<?php print $gz_tarball; ?>">tar.gz</a> one. Checksums for all these are contained in the
    <a href="<?php print $checksums; ?>">checksums file</a>.</p>

    <p>To get a files listing of all our available downloads checkout the <a href="<?php print $downloads; ?>">
    downloads section</a> of the site.</p>

<!-- (NOTE: I still need to investigate whether X11 installation is optional or default on Tiger/Leopard and how dev
    tools installation reacts to X11User being installed or not -- that is, is X11SDK default/optional based on X11User presence?) -->
    <p>Please note that in order to install and run MacPorts on Mac OS X you must have Apple's Developer Tools
    package installed, found at the <a href="http://developer.apple.com/tools/xcode/">Apple Developer site</a>
    or on your Mac OS X installation CDs/DVD. It is also strongly recommended to have the X11 windowing environment (X11 User)
    and its related SDK package (X11 SDK) installed if you wish to install ports that depend on the functionality
    they provide to compile and run. While the former is part of the base Mac OS X installation process, the latter
    is an optional installation in the Developer Tools package, so you need to add it explicitly through the
    &ldquo;Customize&rdquo; button of the corresponding installer.</p>


    <h3 class="subhdr">Mac OS X Package (.pkg) Installer</h3>

    <p>The easiest way to install MacPorts on a Mac OS X system is by downloading the <a href="<?php print $tiger_dmg;
    ?>">dmg for Tiger</a> or the one <a href="<?php print $panther_dmg; ?>">for Panther</a> respectively and running
    the system's Installer by double clicking on the pkg contained therein, following the on-screen instructions until
    completion. This procedure will place a fully functional and default MacPorts installation on your host system,
    ready for usage. If needed your shell configuration files will be adapted by the installer to include the necessary
    settings to run MacPorts and the programs it installs. You may need to open a new shell for these changes to take
    effect.</p>

    <p>The MacPorts &ldquo;<kbd>selfupdate</kbd>&rdquo; command will be run for you by the installer to ensure you have
    our latest available release and the latest revisions to the &ldquo;Portfiles&rdquo; that contain the instructions
    employed in the building and installation of ports. After installation is done, it is recommended that you run this
    step manually on a regular basis to to keep your MacPorts system always current:</p>
    
    <pre>sudo port -d selfupdate</pre>

    <p>At this point you should be ready to enjoy MacPorts!</p>


    <h3 class="subhdr">Source Installation</h3>

    <p>If on the other hand you decide to install MacPorts from source, there are still a couple of things you will need to
    do after downloading the tarball before you can start installing ports, namely compiling and installing MacPorts itself.
    &ldquo;<kbd>cd</kbd>&rdquo; into the directory where you downloaded the package and run &ldquo;<kbd>tar xjvf <a href=
    "<?php print $bz2_tarball; ?>">MacPorts-<?php print $mp_version_major; ?>.tar.bz2 </a></kbd>&rdquo; or &ldquo;<kbd>tar
    xzvf <a href="<?php print $gz_tarball; ?>">MacPorts-<?php print $mp_version_major; ?>.tar.gz</a></kbd>&rdquo;, depending
    on whether you downloaded the bz2 tarball or the gz one, respectively. This will unpack the MacPorts sources that you will
    proceed to build and install. To do so, execute the following:</p>

<pre>cd MacPorts-<?php print $mp_version_major . "\n"; ?>
./configure &amp;&amp; make &amp;&amp; sudo make install</pre>

    <p>Optionally:</p>

<pre>cd ../
rm -rf MacPorts-<?php print $mp_version_major; ?>*</pre>

    <p>These steps need to be perfomed from an administrator account, for which &ldquo;<kbd>sudo</kbd>&rdquo;
    will ask the password upon installation. This procedure will install a pristine MacPorts system and, if the
    optional steps are taken, remove the as of now unnecessary MacPorts-<?php print $mp_version_major; ?> source
    directory and corresponding tarball. To customize your installation you should read the output of
    &ldquo;<kbd>./configure --help | more</kbd>&rdquo; and pass the appropriate options for the settings you wish to
    tweak to the configuration script in the steps detailed above.</p>
	
    <p>You will need to manually adapt your shell's configuration files to find the binaries installed by MacPorts,
    adding <kbd>${prefix}/bin</kbd> and <kbd>${prefix}/sbin</kbd> to the start of your <kbd>PATH</kbd> environment
    variable so that they take precedence over equally named system provided programs. The <kbd>${prefix}</kbd> variable
    stands for the path you chose to install MacPorts onto through <kbd>configure</kbd>'s <kbd>--prefix</kbd> flag,
    defaulting to <kbd>/opt/local</kbd> if no custom value is used. Adding an appropriate X11 <kbd>DISPLAY</kbd>
    environment variable is also recommended if you wish to run X11 dependent programs.</p>

    <p>Lastly, you need to synchronize your installation with the MacPorts rsync server:</p>

    <pre>sudo port -d selfupdate</pre>

    <p>Upon completion MacPorts will be ready to install ports. Again, it is recommended to run the above
    command on a regular basis to keep your installation current.</p>


    <h3 class="subhdr">Other Platforms</h3>

    <p>Running on platforms other than Mac OS X is not the main focus of the MacPorts project, so remaining cross-platform
    is not an actively pursued development goal. Nevertheless, it is not an actively discouraged goal either and as a result
    some experimental support does exist for other POSIX compliant platforms such as FreeBSD and GNU/Linux.</p>

    <p>The full list of requirements to run MacPorts on these other platforms is as follows (we assume you have the
    basics such as GCC and X11):</p>
    
    <ul>
        <li><a href="http://www.tcl.tk/">Tcl</a> (8.3 or 8.4), with threads</li>
        <li><a href="http://gnustep.org/">GNUstep</a> (Base), for Foundation</li>
        <li><a href="http://rsync.samba.org/">rsync</a> for syncing the ports</li>
        <li><a href="http://curl.haxx.se/">cURL</a> for downloading distfiles</li>
        <li><a href="http://www.openssl.org/">OpenSSL</a> or <a href="http://martin.hinner.info/libmd/">libmd</a> for checksums</li>
    </ul>


    <h3 class="subhdr">Help</h3>

    <p>Help on a wide variety of topics is also available in the project <a href="<?php print $guide_url; ?>">Guide</a> and
    through our <a href="<?php print $trac_url; ?>">Trac portal</a> should you run into any problems installing and/or using
    MacPorts. Of particular relevance are the <a href="<?php print $guide_url . '#installing'; ?>">installation</a> &amp; <a
    href="<?php print $guide_url . '#using'; ?>">usage</a> sections of the former and the <a href="<?php print $trac_url .
    'wiki/FAQ'; ?>">FAQ</a> section of the <a href="<?php print $trac_url . 'wiki'; ?>">Wiki</a>, where track of quesitons
    that are fielded often on our <a href="contact.php#lists">mailing lists</a> is kept.</p>

    <p>If any of these resources do not answer your questions or if you need any kind of extended support, there are many ways
    to <a href="contact.php">contact us</a>!</p>
    

    <h3 class="subhdr">SVN Sources</h3>

    <p>If you are developer or a user with a taste for the bleeding edge and wish for the latest changes and feature additions,
    you may acquire the MacPorts sources through SVN.</p>

    <p>Use the following command to check the project's trunk out of the MacPorts anonymous subversion repository, containing
    all of our source modules (MacPorts' &ldquo;base&rdquo;, the ports tree and all of our documentation in raw form):</p>

<pre>svn co <?php print $svn_url . 'trunk'; ?></pre>

    <p>Purpose specific branches are also available at the <kbd><?php print $svn_url . 'branches'; ?></kbd> url.</p>

    <p>Alternatively, if you'd simply like to view the SVN repository without checking it out, you can do so via the
    <a href="http://trac.macports.org/projects/macports/browser">Trac source browser</a>.</p>

</div>


<?php
  print_footer();
?>
