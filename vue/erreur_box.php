<?php /* section temporaire */ ?>
<?php $err_msg = "test"; $err_code = 007; ?>

<style>
  .error_box {
    border: 2px solid #500;
    background-color: #a0101050;
    padding: 1em;
    border-radius: 1em;
    position: relative;
  }
  .error_box p { display: inline; }
  .error_box button {
    text-align: right;
    display: inline-block;
    background: none;
    color: black;
    border: none;
    position: absolute;
    right: 1em;
    cursor: pointer;
    font-weight: bold;
  }
</style>
<script>
  function removeErrorBox(e) {
    let errorBox = e.target.parentNode;
    errorBox.parentNode.removeChild(errorBox);
  }
</script>

<?php /* fin temp */ ?>
<div class="error_box">
  <p> <strong> Erreur : </strong> <?= $err_msg ?> #<?= $err_code ?> </p> <button onclick="removeErrorBox(event)"> X </button>
</div>
