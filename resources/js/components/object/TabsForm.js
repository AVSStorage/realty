import React, {Component} from 'react';
import ReactDOM from 'react-dom';
import Tabs from '@material-ui/core/Tabs';
import Tab from '@material-ui/core/Tab';
import Typography from '@material-ui/core/Typography';
import CalendarWidgetFilter from "./ThirdTabComponents/CalendarWidgetFilter";
import PhotosTab from "./components/PhotosTab";
import {StateProvider} from "../../store/store";
import ObjectTypeTabContainer from "./FirstTabComponents/ObjectTypeTabContainer";
import {reducers} from "../helpers/reducers";
import MainInfoTabContainer from "./SecondTabComponents/MainInfoTabContainer";
import {generateDefaultState, generateStateFromArray} from "../helpers/utilities";
import CalendarTabContainer from "./ThirdTabComponents/CalendarTabContainer";
import CalendarWidgetFilterContainer from "./ThirdTabComponents/CalendarWidgetFilterContainer";
import PhotoTabContainer from "./FourthTabComponents/PhotoTabContainer";

function TabPanel(props) {
    const {children, value, index, ...other} = props;


    return (
        <Typography
            component="div"
            role="tabpanel"
            hidden={value !== index}
            id={`vertical-tabpanel-${index}`}
            aria-labelledby={`vertical-tab-${index}`}
            {...other}
        >
            {value === index && children}
        </Typography>
    );
}


export default class VerticalTabs extends Component {

    constructor(props) {
        super(props);

        let a = [];
        if (Object.keys(JSON.parse(this.props.tab2)).length > 0) {
            let objects = JSON.parse(this.props.tab2).objects;
            for (let j = 0; j < objects.length; j++) {
                let o = objects[j];
                a[j] = {id: j + 1, values: this.generateDefault(o)}
            }
        }
        let items = JSON.parse(this.props.tab2);
        let map = new Map();
        let ar = [];

        let distance = JSON.parse(this.props.tab1).distance;
        if (distance) {
            if (distance.metros.length === 0 && distance.seas.length === 0) {
                distance = {
                    ...distance,
                    metros: [{id: 1, metroName: '', metroPath: ''}],
                    seas: [{id: 1, seaName: '', seaPath: ''}]
                }
            } else if (distance.metros.length === 0) {
                distance = {
                    ...distance,
                    metros: [{id: 1, metroName: '', metroPath: ''}],

                }
            } else if (distance.seas.length === 0) {
                distance = {
                    ...distance,
                    seas: [{id: 1, seaName: '', seaPath: ''}]
                }
            } else {
                distance = {...distance};
            }
        }

        this.state = {
            value: 0,
            objectInInfo: [[{id: 1, name: "Тип строения", service_type: 1}], [{
                id: 21,
                name: "Постельное белье",
                service_type: 2
            }], [{id: 21, name: "Постельное белье", service_type: 2}], [{
                id: 21,
                name: "Постельное белье",
                service_type: 2
            }], [{id: 21, name: "Постельное белье", service_type: 2}], [{
                id: 21,
                name: "Постельное белье",
                service_type: 2
            }], [{id: 21, name: "Постельное белье", service_type: 2}], [{
                id: 21,
                name: "Постельное белье",
                service_type: 2
            }], [{id: 21, name: "Постельное белье", service_type: 2}], [{
                id: 21,
                name: "Постельное белье",
                service_type: 2
            }], [{id: 21, name: "Постельное белье", service_type: 2}]],
            services: [{id: 1, name: "Евро-ремонт"}],
            types: [{id: 1, name: 'Сруб'}],
            room: '',
            stateOfObject: 1,
            calendarData: [[{id: 200, name: "наличными", service_type: 12}], [{
                id: 200,
                name: "наличными",
                service_type: 12
            }], [{id: 200, name: "наличными", service_type: 12}]],
            address: Object.keys(JSON.parse(this.props.tab1)).length > 0 ? JSON.parse(this.props.tab1).address : {
                country: "",
                region: "",
                area: "",
                city: "",
                district: "",
                community: "",
                string: "",
                house: '',
                housing: ""
            },
            distance: Object.keys(JSON.parse(this.props.tab1)).length > 0 ? distance : {
                center: '',
                metros: [
                    {id: 1, metroName: '', metroPath: ''}
                ],
                seas: [
                    {id: 1, seaName: '', seaPath: ''}
                ],
                airoportName: '',
                airoportDistance: '',
                railwayName: '',
                railwayDistance: ''

            },
            objType: Object.keys(JSON.parse(this.props.tab1)).length > 0 ? JSON.parse(this.props.tab1).type : 1,
            service: JSON.parse(this.props.tab2).length > 0 ? items : [],
            validateCalendarWidget: false,
            occupation: {
                selectionRange : [
                    {
                        startDate: new Date(),
                        endDate: new Date(),
                        key: 'selection',
                        text: '1234'
                    }
                ],
                disabledDates: [],
                dateFrom: new Date(),
                dateTo: new Date(),
                minDate: new Date(),
                info: [
                    {
                        id: 1,
                        price: '',
                        days: '',
                        surcharge: '',
                        checked: false
                    }
                ]
            },
            mainInfo: Object.keys(JSON.parse(this.props.tab2)).length > 0 ? generateStateFromArray(JSON.parse(this.props.tab2).calendarData, 12) : [],
            photos: JSON.parse(this.props.tab3).length > 0 ?
                JSON.parse(this.props.tab3).map((photo) => {
                    return {
                        ...photo
                    }
                }) : [],
            user: '',
            linkId: '',
            update: Object.keys(JSON.parse(this.props.tab2)).length > 0 ? true : false,
            loading: true,
            filledServices: Object.keys(JSON.parse(this.props.tab2)).length > 0 ? a : [],
            showAddressError: false,
            coords: Object.keys(JSON.parse(this.props.tab1)).length > 0 ? JSON.parse(this.props.tab1).coords : [44.518454, 34.169964],
        }


    }

    handleChange = (evt, newValue) => {

        this.setState({value: newValue})
    }

    a11yProps = (index) => {
        return {
            id: `vertical-tab-${index}`,
            'aria-controls': `vertical-tabpanel-${index}`,
        };
    }


    componentWillMount() {
        this.getObjectServices().then(response => this.setState({...this.state, ...response}));
    }

    getObjectServices = async () => {
        return await fetch('/objects/services', {
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
        }).then(response => response.json()).then((obj) =>
            ({
                objectInInfo: obj.objects,
                services: obj.states,
                types: obj.types,
                calendarData: obj.calendarData,
                user: obj.user,
                linkId: obj.linkId,
                loading: false
            })
        );

    }

    checkFourthTabValidity = (evt) => {
        evt.preventDefault();
        this.setState({checkFourthTabValidity: true});
    }


    changeTab = (value = 'index') => {

        this.setState({value: value !== 'index' ? value : this.state.value + 1})
    }

    checkValidity = (address, distance, type, coords) => {

        let valid = true;
        // for (let key in address){
        //     const globalRegex = RegExp('^[а-яA-ZА-ЯЁ\\s-]+','g');
        //     if (!address[key].test(value)){
        //         valid = false;
        //     }
        // }
        if (valid) {
            this.setState({
                checkFirstTabValidity: false,
                address: {...address},
                distance: {...distance},
                objType: type,
                coords: coords
            }, () => {
                this.changeTab();
            })
        }
    }


    checkFirstTabValidity = (evt = false) => {
        if (evt) {
            evt.preventDefault();
        }
        this.setState({checkFirstTabValidity: true})
    }

    checkSecondTabValidity = (evt) => {
        evt.preventDefault();
        this.setState({secondTabValidity: true})
    }

    checkSecondTab = (service) => {
        this.setState({secondTabValidity: false, filledServices: service}, () => {
            this.changeTab();
        });
    }

    checkThirdTabValidity = (evt) => {
        evt.preventDefault();
        this.setState({validateCalendarWidget: true});
    }
    //
    // updateCalendarData = (state) => {
    //     console.log(state);
    //     this.setState({occupation: {...state, info: state.info.filter(inf => inf.checked)}});
    // }

    checkCalendarWidgetValidity = (state, validate) => {

        // let valid = validate(state);
        //
        // if (valid) {
        this.setState({
            occupation: {...state, info: state.info.filter(inf => inf.checked)},
            validateCalendarWidget: false
        }, () => {
            this.changeTab();
        })
        // } else {
        //     this.setState({validateCalendarWidget: false})
        // }

    }

    formatDate = (d) => {
        var date = d.getDate();
        var month = d.getMonth() + 1; //Months are zero based
        var year = d.getFullYear();

        return year + '-' + month + '-' + date;
    }

    getThirdTabState = (services, occupation, disabledDates) => {
        console.log(disabledDates);
        this.setState({
            mainInfo: [...services],
            occupation: {
                ...this.state.occupation,
                dateFrom: occupation.startDate,
                dateTo: occupation.endDate,
                disabled: disabledDates
            }
        });
    }

    sendData = (update) => {
        let data = {};
        data.objects = {
            type: this.state.objType,
            coordinateX: this.state.coords[0],
            coordinateY: this.state.coords[1],
            center_path: Number(this.state.distance.center),
            airport: this.state.distance.airoportName,
            airport_path: Number(this.state.distance.airoportDistance),
            railway: this.state.distance.railwayName,
            railway_path: Number(this.state.distance.railwayDistance),
            ...this.state.address,
            created_at: new Date().toISOString().slice(0, 19).replace('T', ' '),
            user_id: this.state.user

        }

        data.sea = this.state.distance.seas.map((sea) => {
            return {sea_path: Number(sea.seaPath), sea: sea.seaName}
        });
        data.metro = this.state.distance.metros.map((metro) => {
            return {metro_path: Number(metro.metroPath), metro: metro.metroName}
        });
        let object_service = this.state.filledServices.map((service) => {
            return {service_id: service.id, value: Array.from(service.values)}
        });
        let object_service2 = this.state.mainInfo.map((service) => {
            return {service_id: service.id, value: Array.from(service.values)}
        });

        data.object_service = object_service.concat(object_service2);

        data.object_occupation = {
            date_from: this.state.occupation.dateFrom.toISOString().slice(0, 10).replace('T', ' '),
            date_to: this.state.occupation.dateTo.toISOString().slice(0, 10).replace('T', ' '),
            price: Number(this.state.occupation.info[0].price),
            min_days: Number(this.state.occupation.info[0].days),
            surcharge: Number(this.state.occupation.info[0].surcharge)
        }


        data.object_locking = this.state.occupation.disabled.map(item => {
            return {
                date_from: item.startDate.toISOString().slice(0, 10).replace('T', ' '),
                date_to: item.endDate.toISOString().slice(0, 10).replace('T', ' ')
            }
        });

        data.occupation_surcharge = this.state.occupation.info.length > 1 ? this.state.occupation.info.splice(0, 1) : [];
        data.object_photos = this.state.photos.filter((photo) => photo.empty === false);
        let queryString = window.location;
        queryString = queryString.pathname.split('/');

        data.id = queryString[3];
        fetch(update ? '/objects/update-object' : '/objects/add-object', {
            method: 'POST',
            body: JSON.stringify(data),
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
        }).then(() => {

                console.log(Number(queryString[3]));
                console.log('/object/' + (Number(queryString[3]) ? queryString[3] : this.state.linkId));
                window.location.replace('/object/' + (Number(queryString[3]) ? queryString[3] : this.state.linkId))

            }
        )
    }


    validate = () => {
        let validItem = 100;
        let address = this.state.address;
        if (Object.keys(address).length === 0) {
            validItem = 0
        } else if (this.state.filledServices.length === 0) {
            validItem = 1
        } else if (this.state.mainInfo.length === 0 || Object.keys(this.state.occupation).length === 0) {
            validItem = 2
        }


        if (validItem !== 100) {
            this.changeTab(validItem);
        } else {
            if (Object.keys(JSON.parse(this.props.tab2)).length > 0) {
                this.sendData(true)
            } else {
                this.sendData(false)
            }

        }


    }

    getPhotos = (photos) => {

        this.setState({checkFourthTabValidity: false, photos: [...photos]}, () => {
            this.validate();
        });
    }

    generateDefault = (values, string = false) => {
        let map = new Map();
        for (let i = 0; i < values.length; i++) {
            map.set(values[i].service_id, values[i].value);
        }

        return map;
    }

    render() {


        let map = new Map();
        let a = [];
        let m = [];


        if (Object.keys(JSON.parse(this.props.tab2)).length > 0) {
            let objects = JSON.parse(this.props.tab2).objects;
            for (let j = 0; j < objects.length; j++) {
                let o = objects[j];
                a[j] = {id: j + 1, values: this.generateDefault(o)}
            }


            let calendarData = JSON.parse(this.props.tab2).calendarData;

            for (let j = 0; j < calendarData.length; j++) {
                let o = calendarData[j];
                m[j] = {id: j + 12, values: this.generateDefault(o)}
            }


        }


        return (
            <div style={{
                flexGrow: 1,
                // backgroundColor: theme.palette.background.paper,
                display: 'flex',
                flexDirection: 'row-reverse'

            }}>
                <StateProvider defaultState={this.state} actions={(dispatch) => ({
                    saveFirstTabToState: (state) => {
                        dispatch({
                            type: 'UPDATE_STATE', data: {
                                address: {...state.address},
                                distance: {...state.distance},
                                objType: state.type,
                                coords: state.coords
                            }
                        });

                        this.changeTab();

                    },
                    sendData : (update, state) => {
                        let data = {};
                        data.objects = {
                            type: state.objType,
                            coordinateX: state.coords[0],
                            coordinateY: state.coords[1],
                            center_path: Number(state.distance.center),
                            airport: state.distance.airoportName,
                            airport_path: Number(state.distance.airoportDistance),
                            railway: state.distance.railwayName,
                            railway_path: Number(state.distance.railwayDistance),
                            ...state.address,
                            created_at: new Date().toISOString().slice(0, 19).replace('T', ' '),
                            user_id: state.user

                        }

                        data.sea = state.distance.seas.map((sea) => {
                            return {sea_path: Number(sea.seaPath), sea: sea.seaName}
                        });
                        data.metro = state.distance.metros.map((metro) => {
                            return {metro_path: Number(metro.metroPath), metro: metro.metroName}
                        });
                        let object_service = state.filledServices.map((service) => {
                            return {service_id: service.id, value: Array.from(service.values)}
                        });
                        let object_service2 = state.mainInfo.map((service) => {
                            return {service_id: service.id, value: Array.from(service.values)}
                        });

                        data.object_service = object_service.concat(object_service2);

                        data.object_occupation = {
                            date_from: state.occupation.dateFrom.toISOString().slice(0, 10).replace('T', ' '),
                            date_to: state.occupation.dateTo.toISOString().slice(0, 10).replace('T', ' '),
                            price: Number(state.occupation.info[0].price),
                            min_days: Number(state.occupation.info[0].days),
                            surcharge: Number(state.occupation.info[0].surcharge)
                        }

                        data.object_locking = state.occupation.disabledDates.map(item => {
                            return {
                                date_from: item.startDate.toISOString().slice(0, 10).replace('T', ' '),
                                date_to: item.endDate.toISOString().slice(0, 10).replace('T', ' ')
                            }
                        });


                        data.occupation_surcharge = state.occupation.info.length > 1 ? state.occupation.info.filter(item => item.checked && item.id !== 1).map(item => ({price: item.price, days: item.days, surcharge: item.surcharge})) : [];
                        data.object_photos = state.photos.filter((photo) => photo.empty === false);
                        let queryString = window.location;
                        queryString = queryString.pathname.split('/');

                        data.id = queryString[3];


                        fetch(update ? '/objects/update-object' : '/objects/add-object', {
                            method: 'POST',
                            body: JSON.stringify(data),
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest',
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                        }).then(() => {
                                window.location.replace('/object/' + (Number(queryString[3]) ? queryString[3] : state.linkId))
                            }
                        )
                    },
                    changeTab : (value) => {
                        this.changeTab(value)
                    },
                    updateState: (data) => {
                        dispatch({type: 'UPDATE_STATE', data});
                    },
                    saveSecondTabToState: (service) => {
                        dispatch({type: 'UPDATE_STATE', data: {secondTabValidity: false, filledServices: service}});
                        this.changeTab();
                    },
                    updateCalendarData: (data) => {
                        dispatch({type: 'UPDATE_STATE_ITEM', name: "occupation", data: data});

                    },
                    updateThirdTabToState : (services, occupation, selectionRange,  disabledDates) => {
                        dispatch({
                            type: 'UPDATE_STATE', data: {
                                occupation: {
                                    ...occupation,
                                    selectionRange,
                                    disabledDates
                                }
                            }
                        });
                        dispatch({type: 'UPDATE_STATE', data: {mainInfo: [...services]}});
                    },
                    saveThirdTabToState: (services, occupation) => {
                        dispatch({
                            type: 'UPDATE_STATE', data: {
                                occupation: {
                                    ...occupation
                                }
                            }
                        });
                        dispatch({type: 'UPDATE_STATE', data: {mainInfo: [...services]}});
                        this.changeTab();
                    }
                })} reducer={(state, action) => {
                    switch (action.type) {
                        case 'UPDATE_STATE':
                            return reducers.UPDATE_STATE(action, state)
                        case 'UPDATE_STATE_ITEM':
                            return reducers.UPDATE_STATE_ITEM(action, state);
                    }
                }}>
                    <Tabs
                        orientation="vertical"
                        value={this.state.value}
                        onChange={this.handleChange}
                        aria-label="Vertical tabs example"
                        className={"chara__right"}
                    >
                        <Tab className={"chara__right-inner"} href={"#main"} label={
                            <div className={"chara__right-inner"}>
                                <span
                                    className={this.state.value === 0 ? "chara__right-btn active" : "chara__right-btn"}>
                                    <img src="/img/personal/1.png" alt="Icon"/>
                                    Тип объекта и адрес
                                </span>
                            </div>
                        } {...this.a11yProps(0)} />
                        <Tab className={"chara__right-inner"} href={"#characteristics"}
                             label={<div className="chara__btn-block">
                            <span
                                className={this.state.value === 1 ? "chara__right-btn active" : "chara__right-btn"}>
                                <img src="/img/white/1.png" alt="Icon"/>
                                Основная информация
                            </span>
                             </div>} {...this.a11yProps(1)} />
                        <Tab className={"chara__right-inner"} href={"#calendar"}
                             label={<div className={"chara__right-inner"}>
                            <span
                                className={this.state.value === 2 ? "chara__right-btn center active" : "chara__right-btn center"}>
                                <img src="/img/add/2.png" alt="Icon"/>
                                Календарь
                            </span>
                             </div>
                             } {...this.a11yProps(2)} />
                        <Tab className={"chara__right-inner"} href={"#photos"} label={
                            <div className={"chara__right-inner"}>
                                <span
                                    className={this.state.value === 3 ? "chara__right-btn active end" : "chara__right-btn end"}>
                                    <img src="/img/add/3.png" alt="Icon"/>
                                    Фото
                                </span>
                            </div>
                        } {...this.a11yProps(3)} />


                            {this.state.value === 1 && (
                                <div className={"d-none d-md-block pl-4"}>
                                    <a data-scroll="#charaTitle" href="#charaTitle" className="chara__position">
                                        Характеристики объекта
                                    </a>

                                    <a data-scroll="#charaHouse" href="#charaHouse" className="chara__position">
                                        Оснащение жилья
                                    </a>

                                    <a data-scroll="#charaTer" href="#charaTer" className="chara__position">
                                        Оснащение территории
                                    </a>

                                    <a data-scroll="#charaWash" href="#charaWash" className="chara__position">
                                        Ванная комната
                                    </a>

                                    <a data-scroll="#charaEat" href="#charaEat" className="chara__position">
                                        Тип питания
                                    </a>

                                    <a data-scroll="#charaObj" href="#charaObj" className="chara__position">
                                        Кухонное оборудование
                                    </a>

                                    <a data-scroll="#charaChild" href="#charaChild" className="chara__position">
                                        Для детей
                                    </a>

                                    <a data-scroll="#charaPark" href="#charaPark" className="chara__position">
                                        Парковка
                                    </a>

                                    <a data-scroll="#charaLive" href="#charaLive" className="chara__position">
                                        Правила проживания
                                    </a>

                                    <a data-scroll="#charaFun" href="#charaFun" className="chara__position">
                                        Инфраструктра и досуг рядом
                                    </a>

                                    <a data-scroll="#charaBeach" href="#charaBeach" className="chara__position">
                                        Пляж
                                    </a>
                                </div>
                            )}

                            {this.state.value === 2 && (
                                <CalendarWidgetFilterContainer/>
                                // <CalendarWidgetFilter updateCalendarData={this.updateCalendarData}
                                //                       data={this.state.occupation}
                                //                       checkValidity={this.state.validateCalendarWidget}
                                //                       checkCalendarWidgetValidity={this.checkCalendarWidgetValidity}/>
                            )}
                    </Tabs>
                    <TabPanel value={this.state.value} index={0}>
                        <ObjectTypeTabContainer/>
                    </TabPanel>
                    <TabPanel value={this.state.value} index={1}>
                        <MainInfoTabContainer data={this.getObjectServices()}/>
                    </TabPanel>
                    <TabPanel value={this.state.value} index={2}>
                        <CalendarTabContainer data={this.getObjectServices()}/>
                    </TabPanel>
                    <TabPanel value={this.state.value} className={'full-width'} index={3}>

                        <PhotoTabContainer/>
                            {/*<PhotosTab photos={JSON.parse(this.props.tab3).length > 0 ? tab3 : this.state.photos}*/}
                            {/*           getState={this.getPhotos} checkValidity={this.state.checkFourthTabValidity}/>*/}

                    </TabPanel>
                </StateProvider>
            </div>
        );
    }
}


const app = document.getElementById('objectsTypes');

if (app) {


    ReactDOM.render(
        <VerticalTabs {...app.dataset} />,
        app
    );
}
