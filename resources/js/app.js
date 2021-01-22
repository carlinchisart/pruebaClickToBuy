require('./bootstrap');

Echo.channel('order')
            .listen('CreatedOrderEvent',(evt) => {
                console.log(evt);
            })
