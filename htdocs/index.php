<?php
pm_Context::init('fpc-test');
if ('GET' === $_SERVER['REQUEST_METHOD']) {
    ?>
    <div id="mailbox">
      <form action="index.php" method="post">
        <input placeholder="Enter the text" type="text" name="name" style="width:270px; height:42px; border: solid 1px #c2c4c6; font-size:16px; padding-left:8px;" />
        <input type="submit" id="button2" value="Next" />
      </form>
    </div>
    <?php
}

if (isset($_POST['name'])) {
    $timestamp = date('d-m-Y');
    if (true === $_SESSION['auth']['isAuthenticatedAsRoot']) {
        $file = '/usr/local/psa/var/' . $timestamp . ".txt";
    } else {
        $domain_id = pm_Session::getCurrentDomain()->getId();
        $domain = pm_Domain::getByDomainId($domain_id);
        $file = $domain->getHomePath() . '/httpdocs'. $timestamp . ".txt";
    }
    echo 'Data received, writing to file <br/>';
    if (!file_put_contents($file, $_POST['name']."\n", FILE_APPEND)) {
        echo 'Sorry! unable to write to the file specified';
    } else {
        echo 'data written to file';
    }
}
