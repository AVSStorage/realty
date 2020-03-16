import React, {Component} from 'react';
import ReactDOM from 'react-dom';
import {ReactDadata} from 'react-dadata';

import Autocomplete from '@material-ui/lab/Autocomplete';
import TextField from "@material-ui/core/TextField";
import parse from "autosuggest-highlight/parse";
import Grid from "@material-ui/core/Grid";
import LocationOnIcon from "@material-ui/core/SvgIcon/SvgIcon";
import Typography from "@material-ui/core/Typography";

export default class Address extends Component {
    constructor(props) {
        super(props);
        this.state = {address: [{'value' : 'россия'}]}
    }

    componentWillMount() {
        fetch('https://dadata.ru/api/v2/suggest/address',{
            method: 'POST',
            body: JSON.stringify({
                "query": 'ро',
                "from_bound": { "value": "country" },
                "to_bound": { "value": "country" },
                "locations": [
                    {
                        "country_iso_code": "*"
                    }
                ]
            }),
            headers: {
                "Authorization": "Token c8fe4da91233a966a1de7bec8aa178dbfb662d87",
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            },
        }).then (response => response.json()).then( (obj) => {
            this.setState({address : obj.suggestions});

        })
    }

    handleChange(item){
        console.log(item);
        fetch('https://dadata.ru/api/v2/suggest/address',{
            method: 'POST',
            body: JSON.stringify({
                "query": item,
                "from_bound": { "value": "country" },
                "to_bound": { "value": "country" },
                "locations": [
                    {
                        "country_iso_code": "*"
                    }
                ]
            }),
            headers: {
                "Authorization": "Token c8fe4da91233a966a1de7bec8aa178dbfb662d87",
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            },
        }).then (response => response.json()).then( (obj) => {
            this.setState({address : obj.suggestions});

        });
    }

    render() {
      //  console.log(this.state.address);
        return (
            <div className="setting__info">
                <div className="form__inner">
                    <label> <span className="initial">Страна</span>
                        <img src="img/flag/1.png" width="22"
                             height="22" alt="Flag" className="flag__russia" />

                        {/*<Autocomplete*/}
                        {/*    id="combo-box-demo"*/}
                        {/*    options={this.state.address}*/}
                        {/*    getOptionLabel={(option) => {option.value}}*/}
                        {/*    style={{ width: 300 }}*/}
                        {/*    renderInput={ (params) => {*/}
                        {/*        return <TextField {...params} label="Combo box" variant="outlined" fullWidth />*/}
                        {/*    }}*/}
                        {/*/>*/}
                {/*        <Autocomplete*/}
                {/*            id="google-map-demo"*/}
                {/*            // style={{ width: 320 }}*/}
                {/*           getOptionLabel={option => option.value}*/}
                {/*            filterOptions={AutoComplete.caseInsensitiveFilter}*/}
                {/*            options={this.state.address}*/}
                {/*            className="automplete"*/}
                {/*            autoComplete*/}
                {/*            // includeInputInList*/}
                {/*            // freeSolo*/}
                {/*            disableOpenOnFocus*/}
                {/*            renderInput={params => (*/}
                {/*                <TextField*/}
                {/*                    {...params}*/}
                {/*                    label="Регион, город, место"*/}
                {/*                    variant="outlined"*/}
                {/*                    fullWidth*/}
                {/*                    onChange={(item) => this.handleChange(item)}*/}
                {/*                />*/}
                {/*            )}*/}
                {/*            renderOption={option => {*/}
                {/*//                 const matches = option.structured_formatting.main_text_matched_substrings;*/}
                {/*//                 const parts = parse(*/}
                {/*//                     option.structured_formatting.main_text,*/}
                {/*//                     matches.map(match => [match.offset, match.offset + match.length]),*/}
                {/*//                 );*/}
                {/*//*/}
                {/*//                 return (*/}
                {/*//                     <Grid container alignItems="center">*/}
                {/*//                         <Grid item>*/}
                {/*//                             <LocationOnIcon className={classes.icon} />*/}
                {/*//                         </Grid>*/}
                {/*//                         <Grid item xs>*/}
                {/*//                             {parts.map((part, index) => (*/}
                {/*//                                 <span key={index} style={{ fontWeight: part.highlight ? 700 : 400 }}>*/}
                {/*//   {part.text}*/}
                {/*// </span>*/}
                {/*//                             ))}*/}
                {/*//*/}
                {/*//                             <Typography variant="body2" color="textSecondary">*/}
                {/*//                                 {option.structured_formatting.secondary_text}*/}
                {/*//                             </Typography>*/}
                {/*//                         </Grid>*/}
                {/*//                     </Grid>*/}
                {/*//                 );*/}
                {/*            }}*/}
                {/*        />*/}
                            <input onInput={() => this.getCountries} id="country" className="name" type="text" placeholder="Россия" />

                    </label>
                </div>

                <div className="form__inner">
                    <label> <span className="initial">Регион</span>
                        <ReactDadata token="c8fe4da91233a966a1de7bec8aa178dbfb662d87" address={this.state.address}
                                     fromBound={'region'} toBound={'region'} className="name"
                                     onChange={obj => this.setState({'address': obj.value})} query="Москва"
                                     placeholder=""/>
                        {/*<input id="region" className="name" type="text" placeholder="Республика Крым"/>*/}

                    </label>
                </div>

                <div className="form__inner">
                    <label> <span className="initial">Район</span>
                        <input className="name name--bottom" type="text" placeholder="Гагаринский"/>

                    </label>
                </div>


                <div className="form__inner">
                    <label> <span className="initial">Город</span>

                        <ReactDadata token="c8fe4da91233a966a1de7bec8aa178dbfb662d87" address={this.state.address}
                                     fromBound={'city'} toBound={'city'} className="name"
                                     onChange={obj => this.setState({'address': obj.value})} query="Москва"
                                     placeholder=""/>


                    </label>
                </div>

                <div className="form__inner">
                    <label> <span className="initial">Округ</span>

                        <input className="name" type="text" placeholder="Если есть"/>

                    </label>
                </div>
            </div>
    );
    }
    }

    if (document.getElementById('address')) {
        ReactDOM.render(<Address/>, document.getElementById('address'));
    }
