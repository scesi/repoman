<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Repositorios de software libre</title>
        <link rel="stylesheet" href="/include/css/style.css" type="text/css" />
        <link rel="stylesheet" href="/include/css/frontpage.css" type="text/css" />
        <link rel="shortcut icon" href="/favicon.ico" />
    </head>
    <body>
    <?php include './include/header.html' ?>
    <?php
        $path = '.';
        $directories = @scandir($path);
        $list = array();

        $translations = array (
            'archlinux'  => array('title' => 'Arch Linux'),
            'backtrack'  => array('title' => 'BackTrack'),
            'centos'     => array('title' => 'CentOS'),
            'chakra'     => array('title' => 'Chakra'),
            'debian'     => array('title' => 'Debian'),
            'fedora'     => array('title' => 'Fedora'),
            'fos'        => array('title' => 'FOS GNU/Linux'),
            'fosobi'     => array('title' => 'OBI GNU/Linux'),
            'freebsd'    => array('title' => 'FreeBSD'),
            'gentoo'     => array('title' => 'Gentoo'),
            'geexbox'    => array('title' => 'GeeXboX'),
            'knoppix'    => array('title' => 'Knoppix'),
            'linuxmce'   => array('title' => 'LinuxMCE'),
            'linuxmint'  => array('title' => 'Linux Mint'),
            'mageia'     => array('title' => 'Mageia'),
            'mandriva'   => array('title' => 'Mandriva'),
            'opensuse'   => array('title' => 'openSUSE'),
            'puppylinux' => array('title' => 'Puppy Linux'),
            'slackware'  => array('title' => 'Slackware'),
            'ubuntu'     => array('title' => 'Ubuntu'),
            'uremix'     => array('title' => 'Uremix'),
            'manjaro'    => array('title' => 'Manjaro Linux'),
            'trisquel'   => array('title' => 'Trisquel'),
            'elementary' => array('title' => 'elementary OS'),
        );

        foreach ($directories as $directory) {
            if (is_dir("$path/$directory")) {
                if ($directory <> '.' && 
                    $directory <> '..' && 
                    $directory <> 'lost+found' && 
                    $directory <> 'include' && 
                    $directory <> '.git' && 
                    $directory <> 'node_modules' && 
                    $directory <> 'logs') {
                    
                    $list[] = $directory;
                }
            }
        }

        shuffle($list);
        $count = 0;
        foreach ($list as $element) {
            $img = file_exists("$path/include/img/distros/$element.png") ? $element : 'blank';
            $title = (isset($translations[$element]['title'])) ? $translations[$element]['title'] : $element;

            echo '<div class="block"><div class="logo">';
            echo '<a href="/' . $element . '/">';
            echo '<img src="/include/img/distros/' . $img . '.png" alt="" title="" /></a>';
            echo '</div><div class="alt"><a href="/' . $element . '">' . $title . '</a></div></div>';

            if ($count >= 4 + rand(0, 2)) {
                $count = 0;
                echo '<br/>';
            }
            $count++;
        }
    ?>
    <?php include './include/footer.html' ?>
    </body>
</html>

