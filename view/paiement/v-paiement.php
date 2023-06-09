<!------------------ ENVOI DES INFORMATIONS A e-Transactions (Formulaire) ------------------>
<div class="container">
    <h2 class="mb-4">Paiement sécurisé</h2>
    <form method="POST" action="<?= $urletrans; ?>">
        <input type="hidden" name="PBX_SITE" value="<?= $pbx_site; ?>">
        <input type="hidden" name="PBX_RANG" value="<?= $pbx_rang; ?>">
        <input type="hidden" name="PBX_IDENTIFIANT" value="<?= $pbx_identifiant; ?>">
        <input type="hidden" name="PBX_TOTAL" value="<?= $pbx_total; ?>">
        <input type="hidden" name="PBX_DEVISE" value="978">
        <input type="hidden" name="PBX_CMD" value="<?= $pbx_cmd; ?>">
        <input type="hidden" name="PBX_PORTEUR" value="<?= $pbx_porteur; ?>">
        <input type="hidden" name="PBX_REPONDRE_A" value="<?= $pbx_repondre_a; ?>">
        <input type="hidden" name="PBX_RETOUR" value="<?= $pbx_retour; ?>">
        <input type="hidden" name="PBX_EFFECTUE" value="<?= $pbx_effectue; ?>">
        <input type="hidden" name="PBX_ANNULE" value="<?= $pbx_annule; ?>">
        <input type="hidden" name="PBX_REFUSE" value="<?= $pbx_refuse; ?>">
        <input type="hidden" name="PBX_HASH" value="SHA512">
        <input type="hidden" name="PBX_RUF1" value="<?= $pbx_ruf1?>">
        <input type="hidden" name="PBX_TIME" value="<?= $dateTime; ?>">
        <input type="hidden" name="PBX_SHOPPINGCART" value="<?= htmlspecialchars($pbx_shoppingcart); ?>">
        <input type="hidden" name="PBX_BILLING" value="<?= htmlspecialchars($pbx_billing); ?>">
        <input type="hidden" name="PBX_HMAC" value="<?= $hmac; ?>">
        <input type="submit" value="Envoyer">
    </form>
</div>
