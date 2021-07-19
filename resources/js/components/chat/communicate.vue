<template>
<div c>
    <div class="chat_window">
        <div class="top_menu d-flex justify-content-between px-3">
            <div class="d-flex justify-content-between">
                   <div class="avatar mr-3">
                            <img :src="'https://i.pravatar.cc/200?u='+ToUser.email"  class="avatar" style="    border-radius: 100%; width: 50px; height: 50px; }">
                    </div>
                <p style="text-align: center;color: #bcbdc0; font-size: 20px;"> {{ToUser.name}} </p>
            </div>
            <div class="title">Chat</div>
            <div class="buttons">
                <div class="button close"></div>
                <div class="button minimize"></div>
                <div class="button maximize"></div>
            </div>
            
            
        </div>
        <ul class="messages">
            <li v-for="message in messages" class="message" :class="message.message_side" >
                <div class="avatar">
                   <img v-if="message.message_side=='left'" :src="'https://i.pravatar.cc/200?u='+ToUser.email"  class="avatar" >
                   <img v-if="message.message_side=='right'" :src="'https://i.pravatar.cc/200?u='+currentUser.email"  class="avatar" >

                </div>
                <div class="text_wrapper">
                    <div class="text">{{ message.text }}</div>
                </div>
            </li>
            <li v-if="is_typing" class="message left" >
                <div class="avatar"></div>
                <div class="text_wrapper">
                    <div class="text">typing...</div>
                </div>
            </li>
        </ul>
        <div class="bottom_wrapper clearfix">
            <div class="message_input_wrapper">
                <input class="message_input" v-model="message_input" @keyup.enter="onSend" placeholder="Type your message here..." />
            </div>
            <div class="send_message" @click="onSend">
                <div class="icon"></div>
                <div class="text">Send</div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
    export default {
        name: "communicate",
        data() {
            return {
                message_input: '',
                toUserId: this.$route.params.id,
                messages: [],
                messages_got_server: [],
                currentUser:{},
                ToUser:{},
                status:'',
                is_typing: false
            }
        },
        watch: {
          message_input() {
              window.Echo.private('message.'+ this.toUserId +'.'+this.currentUser.id)
                  .whisper('typing', {
                      name: this.message_input,
                      
                  });
          }
        },
        methods: {
            /**
             * draw the message
             * */
            draw (message) {
                const $message = {
                    text: message.text,
                    message_side: message.message_side
                };

                this.messages.push($message);

            },

            /**
             * create the message and draw
             * */
            toggleMessage (text, message_side='right') {
                if (text.trim() === '') {
                    return;
                }

                if (message_side === 'right') {
                    this.saveMessage(text);
                }

                this.message_input = '';
                this.draw({
                    text: text,
                    message_side: message_side
                });
                this.scrollMessages();
            },

            /**
             * scroll Animation
             * */
            scrollMessages(){
                const $msgs = $('.messages');
                $msgs.animate({ scrollTop: $msgs.prop('scrollHeight') }, 300);
            },

            /**
             * on click send button and click enter keyboard
             * */
            onSend(){
                return this.toggleMessage(this.message_input);
            },

            /**
            * run the app
            * */
            async run(){
                await axios.post('/api/message/'+ this.toUserId).then((e) => {
                    this.messages_got_server = e.data.data;
                    this.prepareMessages();
                    return true;
                });
            },
            async setUser(){
                await axios.get('/api/getUser/'+ this.toUserId).then((e) => {
                    this.ToUser = e.data.data;
                    return true;
                });
            },

            /**
             * Prepare messages
             * */
            prepareMessages(){
                if (this.messages_got_server === []) return;
                var msg;
                this.messages_got_server.forEach((el) => {
                    msg = {
                        text: el.message,
                        message_side: this.toUserId == el.to_user_id ? 'right' : 'left'
                    }
                    this.messages.push(msg);
                    msg = '';
                })
            },

            /**
             * save Message in server
             * */
            saveMessage(message) {
                const $data = {
                    message: message,
                    to_user_id: this.toUserId
                };
                axios.post('/api/message/send',$data).then((e) => {
                    if (e.data.status !== 'success') {
                        alert('You have same error')
                    }
                });
                return true;
            },

            /**
             * get user details in server for listen to event
             * */
            async setUserDetail(){
                await axios.get('/api/user').then((e) => {
                    this.currentUser = e.data;
                    return true;
                });
            },

            /**
             * listen to event pusher
             * */
            listenEvent(){
                window.Echo.private('message.'+ this.toUserId +'.'+this.currentUser.id)
                    .listen('.listen-message', (e) => {
                        const msg = {
                            text: e.message.message,
                            message_side: 'left'
                        };
                        axios.post('/api/read/message/'+e.message.id);
                        this.is_typing = false;
                        this.messages.push(msg);
                        this.scrollMessages();
                    });
                
                window.Echo.private('message.'+ this.currentUser.id +'.'+this.toUserId)
                    .listenForWhisper('typing',(e) => {
                        if (e.name !== '') {
                            this.is_typing = true;
                            this.scrollMessages();
                        }else {
                            this.is_typing = false;
                        }
                    })
            },

            /**
             * send requist for read message
             * */
            readMessages() {
                axios.post('/api/read/messages/'+this.toUserId);
            }

        },
        async created() {
            await $(document).ready();
            await this.run();
            await this.setUser();
            await this.setUserDetail();
            this.listenEvent();
            this.readMessages();
            this.scrollMessages();
        }
    }
</script>
