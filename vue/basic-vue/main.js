new Vue({
    el: '#app',
    data: {
        message: 'hello'
    },
    methods: {
        reverseMessage: function(){
            this.massage = this.massage.split('').reverse().join('')
            
        }
    }
})