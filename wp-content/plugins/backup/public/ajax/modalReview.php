<?php
require_once(dirname(__FILE__).'/../boot.php');
?>
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title"><?php _backupGuardT('Leave a Review')?></h4>
        </div>
        <div class="modal-body sg-modal-body">
            <div class="col-md-12">
                <div class="sg-justify">
                    <p>If you have some time and appreciated our product, please leave us a review by clicking on the "Leave a review" button below.</p>
                    <p class="text-center sg-no-margin-bottom">
                        <i class="glyphicon glyphicon-star sg-star"></i>
                        <i class="glyphicon glyphicon-star sg-star"></i>
                        <i class="glyphicon glyphicon-star sg-star"></i>
                        <i class="glyphicon glyphicon-star sg-star"></i>
                        <i class="glyphicon glyphicon-star sg-star"></i>
                    </p>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="modal-footer">
            <button type="button" data-dismiss="modal" id="sgDontAskAgain" class="btn sg-btn-grey"><?php echo _backupGuardT('Don\'t ask again')?></button>
            <button type="button" data-dismiss="modal" id="sgAskLater" class="btn sg-btn-grey"><?php echo _backupGuardT('Ask me later')?></button>
            <button type="button" data-dismiss="modal" id="sgLeaveReview" class="btn btn-success" data-review-url="<?php echo SG_REVIEW_URL; ?>"><?php echo _backupGuardT('Leave a review')?></button>
        </div>
    </div>
</div>
