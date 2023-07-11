<body>
    <form id="recharge" method="post" action="<?php echo base_url('CRecharge/debiter_utilisateur') . '/' . $id; ?>">
        <input type="number" id="code" name="code_recharge">
        <button type="submit" id="submitButton">valider</button>
    </form>
    <?php 
        if (isset($Defaillant)) { ?>
        <p><?php echo $Defaillant ?></p>
    <?php 
    $Defaillant ="";
} ?>

</body>

</html>