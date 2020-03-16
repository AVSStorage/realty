import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import ChatForm from "./ChatForm";
import ChatMessages from "./ChatMessages";

class Chat extends Component{
    constructor(props){
        super(props)

        this.state = {
            messages: [],
            newMessage:[]
        }
    }

    componentWillMount() {


        if (this.state.messages.length === 0) {
            let queryString = window.location;
            console.log(this.props);
            queryString = this.props.orderid ? this.props.orderid : queryString.pathname.split('/')[2];
            fetch('/'+ queryString + '/messages?userId=' + (this.props.userid ? this.props.userid : '') , {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }).then(response => response.json()).then(
                obj => this.setState({messages: obj})
            )
        }


    }

    componentDidMount() {

        Echo.private('chat')
            .listen('MessageSent', (e) => {
                console.log(e);
                this.setState({
                    messages: [...this.state.messages,{...e.message, user: e.user}],
                },() => {
                    axios.post('/messages/'+ e.message.id +'/delivered');
                });
            });


        Echo.private('chat')
            .listen('MessageDelivered', (e) => {
                console.log(123);
                console.log(e);
                // _.find(this.conversations, { 'id': e.id }).status = e.status;
            });
    }


    sendMessage = (evt) => {
        evt.preventDefault();
        let newArrayOfMessages = [...this.state.messages,this.state.newMessage];
        let queryString = window.location;
        queryString = queryString.pathname.split('/');
        fetch('/'+ queryString[2] +'/messages',{
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            body: JSON.stringify({ message: this.state.newMessage, order_id: queryString[2], object_id: queryString[3]})
        }).then(response => {



         this.setState({message: [...this.state.messages]});

        });
    }


    updateMessage = (evt) => {
        this.setState({
            newMessage: evt.target.value
        })
    }


    render() {
        return (
            <div>
            <div className="panel-body">
               <ChatMessages messages={this.state.messages}/>
            </div>
            < div
        className = "panel-footer" >
          <ChatForm updateMessage={this.updateMessage} sendMessage={this.sendMessage} newMessage={this.state.newMessage}/>
    </div>
            </div>

    )
    }
}


var root = document.getElementById('chat');

if (root) {
    ReactDOM.render(
        <Chat {...(root.dataset)} />,
        root
    );
}
