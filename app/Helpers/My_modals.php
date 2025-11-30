 
 <?php

    function lgModal()
    {
        $t  = '
            <div class="modal fade bs-example-modal-lg" id="lgModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="myLargeModalLabel">Large modal</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body lg-modal"></div>


                    </div>
                </div>
            </div>';
        return $t;
    }
    function xlModal()
    {
        $t  = '
            <div class="modal fade bs-example-modal-xl" id="xlModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="myLargeModalLabel">Large modal</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body xl-modal"></div>


                    </div>
                </div>
            </div>';
        return $t;
    }

    function flipModal()
    {
        $t = '
        <div id="flipModal" class="modal fade flip" tabindex="-1" aria-labelledby="flipModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="flipModalLabel">Modal Heading</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body flip-modal">
                    </div>
                    

                </div>
            </div>
        </div>
        ';
        return $t;
    }
