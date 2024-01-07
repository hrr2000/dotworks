import Vue from 'vue/dist/vue';
import VueChatScroll from 'vue-chat-scroll';
import io from 'socket.io-client';
import axios from 'axios';

const chat = $("#chat");
const chatLoader = $('#chatLoader');
const socketUrl = $("#socket-provider").data('socket-url');

Vue.use(VueChatScroll);

const ChatRoom = () => {

    const socket = io(socketUrl, {
            auth: {
                id: chat.data('frontend-id'),
                token: chat.data('token'),
                to: chat.data('target-id'),
    },
    });

    const chatApp = new Vue({
        el: '#chat',
        data: {
            messages: [],
            message: '',
            page: 1,
            limit: 15,
            isFull: 0,
        },
        mounted: async function() {
            await this.getMessages();
            const messagesBody = $('.messages-body')[0];
            const loader = $('#chatLoader');
            $(messagesBody).on('scroll', async() => {
                if(this.isFull) return;
                if(messagesBody.scrollTop === 0) {
                    this.isFull = 1;
                    loader.removeClass('d-none');
                    await this.getMessages();
                }
            });
            socket.on('message', (data) => {
                this.messages.push(data);
                console.log(data);
            });
        },
        methods: {
            send: function(e) {
                e.preventDefault();
                if(!this.message) return;
                socket.emit('message', {
                    message: this.message,
                });
                this.message = '';
            },
            getMessages: function () {
                axios.post(`${socketUrl}/messages/${chat.data('frontend-id')}/${chat.data('target-id')}/${this.page}/${chat.data('token')}`)
                    .then(res => {
                        let temp = (res.data).reverse();
                        if(!temp.length) {
                            chatLoader.addClass('d-none');
                            return;
                        }
                        temp.push(...this.messages);
                        this.messages = temp;
                        this.isFull = 0;
                        this.page++;
                        chatLoader.addClass('d-none');
                        $('.messages-body')[0].scrollTop = 580;
                    })
                    .catch(err => {
                        this.isFull = 0;
                        addToast('fail', 'Error', 'An Error Has Occurred');
                    })
            }
        }
    })
}

export default ChatRoom;


