import React, {Component} from 'react';
import ReactDOM from "react-dom";
import VerticalTabs from "./TabsForm";
import {Checkbox} from "@material-ui/core";

export default class CheckBox extends Component {
    constructor(props){

        super(props);
        this.state = {
            checked : this.props.checked === ""
        }
    }

    updateState = (checked,id, path) => {
        fetch(path ,{
            method : "POST",
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            body: JSON.stringify({prepay: !checked ? 1 : 0, id : id})
        }).then(  this.setState({
            checked : checked
        }));
    }


    render() {
        return (
            <div className="top__choice">
                <div className="top">
                    <input onChange={(evt) => this.updateState(evt.target.checked, this.props.id, this.props.path)} type="checkbox"
                           checked={this.state.checked}/>
                </div>
                <div className="top__choice-text">
                    <label>Бронирование без предоплаты</label>
                </div>
            </div>
        )
    }
}


const app = document.querySelectorAll('.checkBox');

if (app) {

    Array.from(app).forEach(a =>
        ReactDOM.render(
            <CheckBox {...a.dataset} />,
            a
        )
    )


}
