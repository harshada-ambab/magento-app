require(
    [
        'jquery',
        'Magento_Ui/js/modal/modal'
    ],
    function(
        $,
        modal
    ) {
        var options = {
            type: 'popup',
            responsive: true,
            innerScroll: true,
            title: '',
            buttons: [{
                text: $.mage.__('Close'),
                class: '',
                click: function () {
                    this.closeModal();
                }
            }]
        };

        
        var popup = modal(options, $('#header-mpdal'));
        $("#click-header").on('click',function(){ 
            $("#header-mpdal").modal("openModal");
        });

    }
);
