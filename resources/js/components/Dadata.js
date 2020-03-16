import React, {Component} from 'react';
import { ReactDadata } from 'react-dadata';
import TextField from '@material-ui/core/TextField';
import * as Suggestions from '../jquery.suggestions.min';
import { findDOMNode } from "react-dom";
export default function Dadata(params) {
//     let myRef = React.createRef();
//     let myRef2 = React.createRef();
//     let myRef3 = React.createRef();
//     let myRef4 = React.createRef();
//
//     console.log(params);
// // Замените на свой API-ключ
//     var token = "f5e8703a53cd3fd8ef2796713ae42f39cd1fb81a";
//
//     function join(arr /*, separator */) {
//         var separator = arguments.length > 1 ? arguments[1] : ", ";
//         return arr.filter(function(n){return n}).join(separator);
//     }
//
//     function formatCity(suggestion) {
//         var address = suggestion.data;
//         console.log(address.city_with_type === address.region_with_type);
//         if (address.city_with_type === address.region_with_type) {
//             return address.settlement_with_type || "";
//         } else {
//             return join([
//                 address.city_with_type]);
//         }
//     }
//
//     var type  = "ADDRESS";
//     var $region = $("#region");
//     var $city   = $("#city");
//     var $street = $("#street");
//     var $house  = $("#house");
//
// //
// // // регион и район
// //     $region.suggestions({
// //         token: token,
// //         type: type,
// //         hint: false,
// //         bounds: "region",
// //         onSelect: function(suggestion) {
// //             console.log(suggestion);
// //         }
// //     });
// //
// //     console.log($region);
// // // город и населенный пункт
// //     $city.suggestions({
// //         token: token,
// //         type: type,
// //         hint: false,
// //         bounds: "city-settlement",
// //         constraints: $region,
// //         formatSelected: formatCity,
// //         onSelect: function(suggestion) {
// //             console.log(suggestion);
// //         }
// //     });
// //
// // // улица
// //     $street.suggestions({
// //         token: token,
// //         type: type,
// //         hint: false,
// //         bounds: "street",
// //         constraints: $city,
// //         count: 15,
// //         onSelect: function(suggestion) {
// //             console.log(suggestion);
// //         }
// //     });
// //
// // // дом
// //     $house.suggestions({
// //         token: token,
// //         type: type,
// //         hint: false,
// //         noSuggestionsHint: false,
// //         bounds: "house",
// //         constraints: $street,
// //         onSelect: function(suggestion) {
// //             console.log(suggestion);
// //         }
// //     });
//
//     const suggest = (element,bounds,constraints) => {
//         $(element).suggestions({
//             token: token,
//             type: type,
//             hint: false,
//             bounds: bounds,
//             formatSelected: bounds === 'city' ? formatCity : {},
//             constraints: constraints ? constraints : {},
//             onSelect: function(suggestion) {
//                 console.log(suggestion);
//             }
//         });
//     }
//

    return (
        <div>


        {/*<TextField style={{"margin-bottom": "10px","border": "1px solid"}} id={"region"} placeHolder={"region"} ref={myRef} onFocus={(evt) => {*/}
        {/*   suggest(evt.target,"region")*/}
        {/*  }}/>*/}
        {/*<TextField style={{"margin-bottom": "10px","border": "1px solid"}} id={"city"} ref={myRef2} onFocus={(evt) => {*/}
        {/*    suggest(evt.target,"city", $(myRef.current.firstChild))*/}
        {/*}}/>*/}
    {/*<TextField style={{"margin-bottom": "10px","border": "1px solid"}} id={"street"}  ref={myRef3} onFocus={(evt) => {*/}
    {/*    suggest(evt.target,"street", $(myRef2.current.firstChild));*/}
    {/*}} />*/}
    {/*<TextField style={{"margin-bottom": "10px","border": "1px solid"}} id={"house"}/>*/}
        </div>
    )
}
