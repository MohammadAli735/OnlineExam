<script>
import axios from "axios";
export default {
    data() {
        return {
            BusinessModel: {
                customer_segments: [],
                courses: [],
                Connects: [],
                Channels: [],
                Costs: [],
                Activitys: [],
                Sourcess: [],
                partnerss: [],
                Incomes: [],
                Expenses: [],
            },
            countList: 0,
            maxCourseName: 20,
            countListConnect: 0,
            maxConnectsName: 20,
            countListChannel: 0,
            maxChannelsName: 20,
            countListCost: 0,
            maxCostsName: 20,
            countListActivity: 0,
            maxCountListActivity: 20,
            countListSources: 0,
            maxCountListSources: 20,
            countListpartners: 0,
            maxCountListpartners: 20,
            countListIncome: 0,
            maxCountListIncome: 20,
            countListExpense: 0,
            maxCountListExpense: 20,
            responseData: {},
        };
    },
    methods: {
        addMore() {
            this.BusinessModel.customer_segments.push({
                customer: "",
            });
            var i = (this.countList += 1);
            var add = document.getElementById("btn-add");
            if (i < 5) {
                add.style.display = "block";
            } else {
                add.style.display = "none";
            }
        },
        sendData() {
            console.log(this.BusinessModel.customer_segments.customer)
            axios
                .post(
                    "http://step24.me/api/ideas/steps/business_model/store/4",
                    this.BusinessModel.customer_segments.customer,
                    {
                        headers: {
                            Authorization:
                                "Bearer " +
                                "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiI5Nzk5IiwianRpIjoiYjYzYjhmMjI2ZmZlYzQ3NTA1NTgwZDY1Y2U2Yjc2MTU3MzYxNDFjNjcwNTJlNWM4ODA0NmNlMjc4MWUwYzQ3MTZlMTA2NTFjMzExNTRkYTgiLCJpYXQiOjE2NjY4NjYwNDMuODI0NzI0LCJuYmYiOjE2NjY4NjYwNDMuODI0NzMsImV4cCI6MTY5ODQwMjA0My41Nzc2NTEsInN1YiI6IjEwIiwic2NvcGVzIjpbXX0.cfQaTqtZB_onterIpY5HM2mv0-cbpSbUgV9eE8KEfrPbfIl4TO8URgr8WrssUtQXXnBNy70GiIYtkhttRFVvEDXw2oHxQbWHSXJegMzNCoivn2qTJoyFyDLF3cIqUIBb4cXqY_KCm1M5d7A1KrTsd6-Y5NfNfh8mf18AmuVYf7fX0s35zWytkpxLf2Q3-AVy-9CPbN8jV16sqm59O1AoKzV5k_QLkuA0Ob8luErOia1BA_Zzu7HCk3xfihxjrJNH_kNwweeAW0FrZbMlDKwlvbhFYmTYYROux6q2UL5zOMqwK2-41OQI-arGLFaanIBg0lopQM0oGWgt1j9TP0zi6oaW02XBE8JV3MASbpxwxcSnszJmJTaqwt9Xpz_FusZz7oDAXwSzYboK1cxPH_5q_lT-z5jPw8fUNDvOka4kgTGkCRe5cbW6dBGicCPRPxTFcooRxlkrRh99Uf5pjTRA-OpgqC8kVZbwuj4POTgLQWJjUj_nHQGx1IgA_VjXMN34-EutSzMmj1U5nU45Ma9NsmkEPk3PC28eqcu-B5yG6Rd9GoKJMHjqax8lDfcXVzeS2YyGXHt6ncUSB4a5tCiirI-de2l7qfMSnFhTo0AtzdojSQ13YNc_LW9eGI7RI8HozcSvcY8bF7fktBXQ7pKYrw7N-auAfdLUunOBhtAZsdI",
                        },
                    }
                )
                .then(function (response) {
                    console.log(response + "send success");
                });
            axios
                .get("http://step24.me/api/ideas/steps/business_model/4", {
                    headers: {
                        Authorization:
                            "Bearer " +
                            "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiI5Nzk5IiwianRpIjoiYjYzYjhmMjI2ZmZlYzQ3NTA1NTgwZDY1Y2U2Yjc2MTU3MzYxNDFjNjcwNTJlNWM4ODA0NmNlMjc4MWUwYzQ3MTZlMTA2NTFjMzExNTRkYTgiLCJpYXQiOjE2NjY4NjYwNDMuODI0NzI0LCJuYmYiOjE2NjY4NjYwNDMuODI0NzMsImV4cCI6MTY5ODQwMjA0My41Nzc2NTEsInN1YiI6IjEwIiwic2NvcGVzIjpbXX0.cfQaTqtZB_onterIpY5HM2mv0-cbpSbUgV9eE8KEfrPbfIl4TO8URgr8WrssUtQXXnBNy70GiIYtkhttRFVvEDXw2oHxQbWHSXJegMzNCoivn2qTJoyFyDLF3cIqUIBb4cXqY_KCm1M5d7A1KrTsd6-Y5NfNfh8mf18AmuVYf7fX0s35zWytkpxLf2Q3-AVy-9CPbN8jV16sqm59O1AoKzV5k_QLkuA0Ob8luErOia1BA_Zzu7HCk3xfihxjrJNH_kNwweeAW0FrZbMlDKwlvbhFYmTYYROux6q2UL5zOMqwK2-41OQI-arGLFaanIBg0lopQM0oGWgt1j9TP0zi6oaW02XBE8JV3MASbpxwxcSnszJmJTaqwt9Xpz_FusZz7oDAXwSzYboK1cxPH_5q_lT-z5jPw8fUNDvOka4kgTGkCRe5cbW6dBGicCPRPxTFcooRxlkrRh99Uf5pjTRA-OpgqC8kVZbwuj4POTgLQWJjUj_nHQGx1IgA_VjXMN34-EutSzMmj1U5nU45Ma9NsmkEPk3PC28eqcu-B5yG6Rd9GoKJMHjqax8lDfcXVzeS2YyGXHt6ncUSB4a5tCiirI-de2l7qfMSnFhTo0AtzdojSQ13YNc_LW9eGI7RI8HozcSvcY8bF7fktBXQ7pKYrw7N-auAfdLUunOBhtAZsdI",
                    },
                })
                .then((res) => {
                    this.responseData = res.data.BusinessModel;
                })
                .catch((error) => {
                    console.log(error);
                });
        },
        addMoreConnect() {
            this.Connects.push({
                ConnectsName: "",
            });
            var i = (this.countListConnect += 1);
            var addConnect = document.getElementById("btn-add-Connect");
            if (i < 3) {
                addConnect.style.display = "block";
            } else {
                addConnect.style.display = "none";
            }
        },
        addMoreChannel() {
            this.Channels.push({
                ChannelsName: "",
            });
            var i = (this.countListChannel += 1);
            var addChannel = document.getElementById("btn-add-Channel");
            if (i < 3) {
                addChannel.style.display = "block";
            } else {
                addChannel.style.display = "none";
            }
        },

        addMoreCost() {
            this.Costs.push({
                CostsName: "",
            });
            var i = (this.countListCost += 1);
            var addCost = document.getElementById("btn-add-Cost");
            if (i < 5) {
            } else {
                addCost.style.display = "none";
            }
        },
        addMoreActivity() {
            this.Activitys.push({
                ActivitysName: "",
            });
            var i = (this.countListActivity += 1);
            var addActivity = document.getElementById("btn-add-Activity");
            if (i < 3) {
            } else {
                addActivity.style.display = "none";
            }
        },
        addMoreSources() {
            this.Sourcess.push({
                SourcessName: "",
            });
            var i = (this.countListSources += 1);
            var addSources = document.getElementById("btn-add-Sources");
            if (i < 3) {
            } else {
                addSources.style.display = "none";
            }
        },
        addMorepartners() {
            this.partnerss.push({
                partnerssName: "",
            });
            var i = (this.countListpartners += 1);
            var addpartners = document.getElementById("btn-add-partners");
            if (i < 3) {
            } else {
                addpartners.style.display = "none";
            }
        },
        addMoreIncome() {
            this.Incomes.push({
                IncomesName: "",
            });
            var i = (this.countListIncome += 1);
            var addIncome = document.getElementById("btn-add-Income");
            if (i < 10) {
            } else {
                addIncome.style.display = "none";
            }
        },
        addMoreExpense() {
            this.Expenses.push({
                ExpensesName: "",
            });
            var i = (this.countListExpense += 1);
            var addExpense = document.getElementById("btn-add-Expense");
            if (i < 10) {
            } else {
                addExpense.style.display = "none";
            }
        },

        remove(index) {
            this.courses.splice(index, 1);
            this.countList -= 1;
            var add = document.getElementById("btn-add");
            if (this.countList < 5) {
                add.style.display = "block";
            }
        },

        removeConnect(indexConnect) {
            this.Connects.splice(indexConnect, 1);
            this.countListConnect -= 1;
            var addConnect = document.getElementById("btn-add-Connect");
            if (this.countListConnect < 3) {
                addConnect.style.display = "block";
            }
        },
        removeChannel(indexChannel) {
            this.Channels.splice(indexChannel, 1);
            this.countListChannel -= 1;
            var addChannel = document.getElementById("btn-add-Channel");
            if (this.countListChannel < 3) {
                addChannel.style.display = "block";
            }
        },
        removeCost(indexCost) {
            this.Costs.splice(indexCost, 1);
            this.countListCost -= 1;
            var addCost = document.getElementById("btn-add-Cost");
            if (this.countListCost < 5) {
                addCost.style.display = "block";
            }
        },
        removeActivity(indexActivity) {
            this.Activitys.splice(indexActivity, 1);
            this.countListActivity -= 1;
            var addActivity = document.getElementById("btn-add-Activity");
            if (this.countListActivity < 3) {
                addActivity.style.display = "block";
            }
        },
        removeSources(indexSources) {
            this.Sourcess.splice(indexSources, 1);
            this.countListSources -= 1;
            var addSources = document.getElementById("btn-add-Sources");
            if (this.countListSources < 3) {
                addSources.style.display = "block";
            }
        },
        removepartners(indexpartners) {
            this.partnerss.splice(indexpartners, 1);
            this.countListpartners -= 1;
            var addpartners = document.getElementById("btn-add-partners");
            if (this.countListpartners < 5) {
                addpartners.style.display = "block";
            }
        },
        removeIncome(indexIncome) {
            this.Incomes.splice(indexIncome, 1);
            this.countListIncome -= 1;
            var addIncome = document.getElementById("btn-add-Income");
            if (this.countListIncome < 10) {
                addIncome.style.display = "block";
            }
        },
        removeExpense(indexExpense) {
            this.Expenses.splice(indexExpense, 1);
            this.countListExpense -= 1;
            var addExpense = document.getElementById("btn-add-Expense");
            if (this.countListExpense < 10) {
                addExpense.style.display = "block";
            }
        },
    },
    mounted() {
        axios
            .get("http://step24.me/api/ideas/steps/business_model/4", {
                headers: {
                    Authorization:
                        "Bearer " +
                        "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiI5Nzk5IiwianRpIjoiYjYzYjhmMjI2ZmZlYzQ3NTA1NTgwZDY1Y2U2Yjc2MTU3MzYxNDFjNjcwNTJlNWM4ODA0NmNlMjc4MWUwYzQ3MTZlMTA2NTFjMzExNTRkYTgiLCJpYXQiOjE2NjY4NjYwNDMuODI0NzI0LCJuYmYiOjE2NjY4NjYwNDMuODI0NzMsImV4cCI6MTY5ODQwMjA0My41Nzc2NTEsInN1YiI6IjEwIiwic2NvcGVzIjpbXX0.cfQaTqtZB_onterIpY5HM2mv0-cbpSbUgV9eE8KEfrPbfIl4TO8URgr8WrssUtQXXnBNy70GiIYtkhttRFVvEDXw2oHxQbWHSXJegMzNCoivn2qTJoyFyDLF3cIqUIBb4cXqY_KCm1M5d7A1KrTsd6-Y5NfNfh8mf18AmuVYf7fX0s35zWytkpxLf2Q3-AVy-9CPbN8jV16sqm59O1AoKzV5k_QLkuA0Ob8luErOia1BA_Zzu7HCk3xfihxjrJNH_kNwweeAW0FrZbMlDKwlvbhFYmTYYROux6q2UL5zOMqwK2-41OQI-arGLFaanIBg0lopQM0oGWgt1j9TP0zi6oaW02XBE8JV3MASbpxwxcSnszJmJTaqwt9Xpz_FusZz7oDAXwSzYboK1cxPH_5q_lT-z5jPw8fUNDvOka4kgTGkCRe5cbW6dBGicCPRPxTFcooRxlkrRh99Uf5pjTRA-OpgqC8kVZbwuj4POTgLQWJjUj_nHQGx1IgA_VjXMN34-EutSzMmj1U5nU45Ma9NsmkEPk3PC28eqcu-B5yG6Rd9GoKJMHjqax8lDfcXVzeS2YyGXHt6ncUSB4a5tCiirI-de2l7qfMSnFhTo0AtzdojSQ13YNc_LW9eGI7RI8HozcSvcY8bF7fktBXQ7pKYrw7N-auAfdLUunOBhtAZsdI",
                },
            })
            .then((res) => {
                this.responseData = res.data.BusinessModel;
                console.log("get success" + res);
            })
            .catch((error) => {
                console.log(error);
            });
    },
};
</script>
<template>
    <main class="container">
        <div class="bg-danger" v-for="i in responseData" :key="index">
            <p class="bg-warning">
                {{ index }}
                as
                {{ i }}
            </p>
            <span class="bg-success" v-for="f in BusinessModel.customer_segments">
{{f.customer}}
            </span>
        </div>
        <section class="d-flex flex-wrap">
            <section
                class="card card-workbom card-1 col-12 col-sm-12 col-md-2 col-lg-2 col-xl-2"
            >
                <div class="text-head-bom mt-2">
                    <span class="bg-danger">
                        .
                        <i class="fas fa-male blue-icon"></i>
                    </span>
                    <span> بخش مشتریان </span>
                    <button
                        type="button"
                        data-bs-toggle="modal"
                        data-bs-target="#exampleModal"
                        data-bs-whatever="@fat"
                        class="btn-workbom btn btn-danger"
                    >
                        <i class="fas fa-edit"></i>
                    </button>
                </div>
                <div>
                    <ul id="ul">
                        <!-- از بک اند میاد -->
                        <div v-for="i in BusinessModel.customer_segments">
                            <div class="flex justify-start ml-2">
                                <li class="list-item-costumer">
                                    {{ i.customer }}
                                </li>
                            </div>
                        </div>
                    </ul>
                </div>

                <div
                    class="modal fade"
                    id="exampleModal"
                    tabindex="-1"
                    aria-labelledby="exampleModalLabel"
                    aria-hidden="true"
                >
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">
                                    فرم بخش مشتریان را پر کنید
                                </h5>

                                <button
                                    type="button"
                                    class="btn-close-workbom"
                                    data-bs-dismiss="modal"
                                    aria-label="Close"
                                    title="بستن"
                                >
                                    <i class="fas fa-times close-icon"></i>
                                </button>
                            </div>
                            <!-- بدنه مودال -->
                            <div class="modal-body">
                                <div class="hello">
                                    <div class="w-full p-10">
                                        <div
                                            v-for="(
                                                X, index
                                            ) in BusinessModel.customer_segments"
                                            :key="index"
                                        >
                                            <div
                                                class="flex justify-start ml-2"
                                            >
                                                <div class="d-flex mt-2">
                                                    <div class="kk">
                                                        <input
                                                            class="effect-9"
                                                            v-model="X.customer"
                                                            placeholder="افزودن نام مشتری"
                                                            :maxlength="
                                                                maxCourseName
                                                            "
                                                        />
                                                        <span
                                                            class="focus-border"
                                                        >
                                                            <i></i>
                                                        </span>
                                                    </div>
                                                    <div>
                                                        <button
                                                            type="button"
                                                            class="btn-delete me-2"
                                                            title="حذف"
                                                            @click="
                                                                remove(index)
                                                            "
                                                            v-show="index != 0"
                                                        >
                                                            <i
                                                                class="fas fa-trash delete-workbom"
                                                            ></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="my-2">
                                            <button
                                                type="button"
                                                class="btn-add-imput my-2"
                                                id="btn-add"
                                                @click="addMore()"
                                            >
                                                افزودن نام مشتری
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <p class="lll">
                                    در این بخش لیست مشتریان خود را بنویسید
                                </p>
                                <button
                                    type="button"
                                    @click="sendData"
                                    class="btn-confirm"
                                >
                                    تایید
                                    <i class="fas fa-check"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section
                class="card card-workbom card-1 col-12 col-sm-12 col-md-2 col-lg-2 col-xl-2 d-flex flex-column"
            >
                <div class="card card-workbom card-1">
                    <div class="text-head-bom mt-2">
                        <i class="fab fa-gratipay blue-icon"></i>
                        <span> ارتباط با مشتری </span>
                        <button
                            type="button"
                            data-bs-toggle="modal"
                            data-bs-target="#ConnectModal"
                            data-bs-whatever="@fat"
                            class="btn-workbom btn btn-danger"
                        >
                            <i class="fas fa-edit"></i>
                        </button>
                    </div>
                    <div>
                        <ul id="ul">
                            <div
                                v-for="(Connect, indexConnect) in Connects"
                                :key="indexConnect"
                            >
                                <div class="flex justify-start ml-2">
                                    <li class="list-item-costumer">
                                        {{ Connect.ConnectsName }}
                                    </li>
                                </div>
                            </div>
                        </ul>
                    </div>

                    <div
                        class="modal fade"
                        id="ConnectModal"
                        tabindex="-1"
                        aria-labelledby="ConnectModalLabel"
                        aria-hidden="true"
                    >
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5
                                        class="modal-title"
                                        id="ConnectModalLabel"
                                    >
                                        فرم ارتباط با مشتری
                                    </h5>
                                    <button
                                        type="button"
                                        class="btn-close-workbom"
                                        data-bs-dismiss="modal"
                                        aria-label="Close"
                                    >
                                        <i class="fas fa-times close-icon"></i>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="helloa">
                                        <!-- <h1>{{ msg }}</h1> -->
                                        <div class="w-full p-10">
                                            <div
                                                v-for="(
                                                    Connect, indexConnect
                                                ) in Connects"
                                                :key="indexConnect"
                                            >
                                                <div
                                                    class="flex justify-start ml-2"
                                                >
                                                    <div class="d-flex mt-2">
                                                        <div class="kk">
                                                            <input
                                                                class="effect-9"
                                                                v-model="
                                                                    Connect.ConnectsName
                                                                "
                                                                :maxlength="
                                                                    maxConnectsName
                                                                "
                                                                placeholder="ارتباط با مشتری"
                                                            />
                                                            <span
                                                                class="focus-border"
                                                            >
                                                                <i></i>
                                                            </span>
                                                        </div>

                                                        <button
                                                            type="button"
                                                            class="btn-delete me-2"
                                                            @click="
                                                                removeConnect(
                                                                    indexConnect
                                                                )
                                                            "
                                                            v-show="
                                                                indexConnect !=
                                                                0
                                                            "
                                                        >
                                                            <i
                                                                class="fas fa-trash delete-workbom"
                                                            ></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <button
                                                type="button"
                                                class="btn-add-imput my-2"
                                                id="btn-add-Connect"
                                                @click="addMoreConnect()"
                                            >
                                                ارتباط با مشتری
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <p>راه های ارتباط با مشتری را بنویسید</p>
                                    <button
                                        type="button"
                                        @click="SendShow"
                                        class="btn-confirm"
                                    >
                                        تایید

                                        <i class="fas fa-check"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card card-workbom card-1">
                    <div class="text-head-bom">
                        <i class="fas fa-bullhorn blue-icon"></i>
                        <span>کانال های ارتباطی</span>
                        <button
                            type="button"
                            data-bs-toggle="modal"
                            data-bs-target="#ChannelModal"
                            data-bs-whatever="@fat"
                            class="btn-workbom"
                        >
                            <i class="fas fa-edit"></i>
                        </button>
                    </div>
                    <div>
                        <ul id="ul">
                            <div
                                v-for="(Channel, indexChannel) in Channels"
                                :key="indexChannel"
                            >
                                <div class="flex justify-start ml-2">
                                    <li class="list-item-costumer">
                                        {{ Channel.ChannelsName }}
                                    </li>
                                </div>
                            </div>
                        </ul>
                    </div>

                    <div
                        class="modal fade"
                        id="ChannelModal"
                        tabindex="-1"
                        aria-labelledby="ChannelModalLabel"
                        aria-hidden="true"
                    >
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5
                                        class="modal-title"
                                        id="ChannelModalLabel"
                                    >
                                        فرم کانال های ارتباطی را پر کنید
                                    </h5>
                                    <button
                                        type="button"
                                        class="btn-close-workbom"
                                        data-bs-dismiss="modal"
                                        aria-label="Close"
                                    >
                                        <i class="fas fa-times close-icon"></i>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="helloa">
                                        <!-- <h1>{{ msg }}</h1> -->
                                        <div class="w-full p-10">
                                            <div
                                                v-for="(
                                                    Channel, indexChannel
                                                ) in Channels"
                                                :key="indexChannel"
                                            >
                                                <div
                                                    class="flex justify-start ml-2"
                                                >
                                                    <div class="d-flex mt-2">
                                                        <div class="kk">
                                                            <input
                                                                class="effect-9"
                                                                v-model="
                                                                    Channel.ChannelsName
                                                                "
                                                                placeholder="کانال ارتباطی"
                                                                :maxlength="
                                                                    maxChannelsName
                                                                "
                                                            />
                                                            <span
                                                                class="focus-border"
                                                            >
                                                                <i></i>
                                                            </span>
                                                        </div>

                                                        <button
                                                            type="button"
                                                            class="btn-delete me-2"
                                                            @click="
                                                                removeChannel(
                                                                    indexChannel
                                                                )
                                                            "
                                                            v-show="
                                                                indexChannel !=
                                                                0
                                                            "
                                                        >
                                                            <i
                                                                class="fas fa-trash delete-workbom"
                                                            ></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <button
                                            type="button"
                                            class="btn-add-imput mt-2"
                                            id="btn-add-Channel"
                                            @click="addMoreChannel()"
                                        >
                                            کانال ارتباطی
                                        </button>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <p>کانال ارتباطی خود را بنویسید</p>
                                    <button
                                        type="button"
                                        @click="SendShow"
                                        class="btn-confirm"
                                    >
                                        تایید
                                        <i class="fas fa-check"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section
                class="card card-workbom card-1 col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4"
            >
                <div class="text-head-bom mt-2">
                    <i class="fas fa-gift blue-icon"></i>
                    <span> ارزش پیشنهادی </span>
                    <button
                        type="button"
                        data-bs-toggle="modal"
                        data-bs-target="#CostModal"
                        data-bs-whatever="@fat"
                        class="btn-workbom"
                    >
                        <i class="fas fa-edit"></i>
                    </button>
                </div>
                <div>
                    <ul id="ul">
                        <div
                            v-for="(cost, indexCost) in Costs"
                            :key="indexCost"
                        >
                            <div class="flex justify-start ml-2">
                                <li class="list-item-costumer">
                                    {{ cost.CostsName }}
                                </li>
                            </div>
                        </div>
                    </ul>
                </div>

                <div
                    class="modal fade"
                    id="CostModal"
                    tabindex="-1"
                    aria-labelledby="CostModalLabel"
                    aria-hidden="true"
                >
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="CostModalLabel">
                                    فرم ارزش پیشنهادی را پر کنید
                                </h5>
                                <button
                                    type="button"
                                    class="btn-close-workbom"
                                    data-bs-dismiss="modal"
                                    aria-label="Close"
                                >
                                    <i class="fas fa-times close-icon"></i>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="helloa">
                                    <!-- <h1>{{ msg }}</h1> -->
                                    <div class="w-full p-10">
                                        <div
                                            v-for="(cost, indexCost) in Costs"
                                            :key="indexCost"
                                        >
                                            <div
                                                class="flex justify-start mt-2"
                                            >
                                                <div class="d-flex">
                                                    <div class="kk">
                                                        <input
                                                            class="effect-9"
                                                            v-model="
                                                                cost.CostsName
                                                            "
                                                            placeholder="ارزش پیشنهادی"
                                                            :maxlength="
                                                                maxCostsName
                                                            "
                                                        />
                                                        <span
                                                            class="focus-border"
                                                        >
                                                            <i></i>
                                                        </span>
                                                    </div>

                                                    <button
                                                        type="button"
                                                        class="btn-delete me-2"
                                                        @click="
                                                            removeCost(
                                                                indexCost
                                                            )
                                                        "
                                                        v-show="indexCost != 0"
                                                    >
                                                        <i
                                                            class="fas fa-trash delete-workbom"
                                                        ></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <button
                                            type="button"
                                            class="btn-add-imput mt-2"
                                            id="btn-add-Cost"
                                            @click="addMoreCost()"
                                        >
                                            ارزش پیشنهادی
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <p>ارزش پیشنهادی خود را بنویسید</p>
                                <button
                                    type="button"
                                    @click="SendShow"
                                    class="btn-confirm"
                                >
                                    تایید
                                    <i class="fas fa-check"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section
                class="card card-workbom card-1 col-12 col-sm-12 col-md-2 col-lg-2 col-xl-2"
            >
                <div class="card card-workbom card-1">
                    <div class="text-head-bom mt-2">
                        <i class="fas fa-user-cog blue-icon ms-2"></i>
                        <span>امور اصلی</span>
                        <button
                            type="button"
                            data-bs-toggle="modal"
                            data-bs-target="#ActivityModal"
                            data-bs-whatever="@fat"
                            class="btn-workbom"
                        >
                            <i class="fas fa-edit"></i>
                        </button>
                    </div>
                    <div>
                        <ul id="ul">
                            <div
                                v-for="(Activity, indexActivity) in Activitys"
                                :key="indexActivity"
                            >
                                <div class="flex justify-start ml-2">
                                    <li class="list-item-costumer">
                                        {{ Activity.ActivitysName }}
                                    </li>
                                </div>
                            </div>
                        </ul>
                    </div>

                    <div
                        class="modal fade"
                        id="ActivityModal"
                        tabindex="-1"
                        aria-labelledby="ActivityModalLabel"
                        aria-hidden="true"
                    >
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5
                                        class="modal-title"
                                        id="ActivityModalLabel"
                                    >
                                        فرم امور اصلی را پر کنید
                                    </h5>
                                    <button
                                        type="button"
                                        class="btn-close-workbom"
                                        data-bs-dismiss="modal"
                                        aria-label="Close"
                                    >
                                        <i class="fas fa-times close-icon"></i>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="helloa">
                                        <!-- <h1>{{ msg }}</h1> -->
                                        <div class="w-full p-10">
                                            <div
                                                v-for="(
                                                    Activity, indexActivity
                                                ) in Activitys"
                                                :key="indexActivity"
                                            >
                                                <div
                                                    class="flex justify-start ml-2"
                                                >
                                                    <div class="d-flex mt-2">
                                                        <div class="kk">
                                                            <input
                                                                class="effect-9"
                                                                v-model="
                                                                    Activity.ActivitysName
                                                                "
                                                                placeholder="ارزش پیشنهادی"
                                                                :maxlength="
                                                                    maxCountListActivity
                                                                "
                                                            />
                                                            <span
                                                                class="focus-border"
                                                            >
                                                                <i></i>
                                                            </span>
                                                        </div>
                                                        <button
                                                            type="button"
                                                            class="btn-delete me-2"
                                                            @click="
                                                                removeActivity(
                                                                    indexActivity
                                                                )
                                                            "
                                                            v-show="
                                                                indexActivity !=
                                                                0
                                                            "
                                                        >
                                                            <i
                                                                class="fas fa-trash delete-workbom"
                                                            ></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <button
                                                type="button"
                                                class="btn-add-imput mt-2"
                                                id="btn-add-Activity"
                                                @click="addMoreActivity()"
                                            >
                                                ارزش پیشنهادی
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <p>ارزش پیشنهادی خود را بنویسید</p>
                                    <button
                                        type="button"
                                        @click="SendShow"
                                        class="btn-confirm"
                                    >
                                        تایید
                                        <i class="fas fa-check"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card card-workbom card-1">
                    <div class="text-head-bom mt-2">
                        <i class="fas fa-database blue-icon ms-2"></i>
                        <span>منابع اصلی</span>
                        <button
                            type="button"
                            data-bs-toggle="modal"
                            data-bs-target="#SourcesModal"
                            data-bs-whatever="@fat"
                            class="btn-workbom"
                        >
                            <i class="fas fa-edit"></i>
                        </button>
                    </div>
                    <div>
                        <ul id="ul">
                            <div
                                v-for="(Sources, indexSources) in Sourcess"
                                :key="indexSources"
                            >
                                <div class="flex justify-start ml-2">
                                    <li class="list-item-costumer">
                                        {{ Sources.SourcessName }}
                                    </li>
                                </div>
                            </div>
                        </ul>
                    </div>

                    <div
                        class="modal fade"
                        id="SourcesModal"
                        tabindex="-1"
                        aria-labelledby="SourcesModalLabel"
                        aria-hidden="true"
                    >
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5
                                        class="modal-title"
                                        id="SourcesModalLabel"
                                    >
                                        فرم منابع اصلی را پر کنید
                                    </h5>
                                    <button
                                        type="button"
                                        class="btn-close-workbom"
                                        data-bs-dismiss="modal"
                                        aria-label="Close"
                                    >
                                        <i class="fas fa-times close-icon"></i>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="helloa">
                                        <!-- <h1>{{ msg }}</h1> -->
                                        <div class="w-full p-10">
                                            <div
                                                v-for="(
                                                    cost, indexSources
                                                ) in Sourcess"
                                                :key="indexSources"
                                            >
                                                <div
                                                    class="flex justify-start ml-2"
                                                >
                                                    <div class="d-flex mt-2">
                                                        <div class="kk">
                                                            <input
                                                                class="effect-9"
                                                                v-model="
                                                                    cost.SourcessName
                                                                "
                                                                placeholder="منابع اصلی"
                                                                :maxlength="
                                                                    maxCountListSources
                                                                "
                                                            />
                                                            <span
                                                                class="focus-border"
                                                            >
                                                                <i></i>
                                                            </span>
                                                        </div>

                                                        <button
                                                            type="button"
                                                            class="btn-delete me-2"
                                                            @click="
                                                                removeSources(
                                                                    indexSources
                                                                )
                                                            "
                                                            v-show="
                                                                indexSources !=
                                                                0
                                                            "
                                                        >
                                                            <i
                                                                class="fas fa-trash delete-workbom"
                                                            ></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <button
                                                type="button"
                                                class="btn-add-imput mt-2"
                                                id="btn-add-Sources"
                                                @click="addMoreSources()"
                                            >
                                                منابع اصلی
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <p>منابع اصلی خود را بنویسید</p>
                                    <button
                                        type="button"
                                        @click="SendShow"
                                        class="btn-confirm"
                                    >
                                        تایید
                                        <i class="fas fa-check"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section
                class="card card-workbom card-1 col-12 col-sm-12 col-md-2 col-lg-2 col-xl-2"
            >
                <div class="text-head-bom mt-2">
                    <i class="fas fa-handshake blue-icon mt-2"></i>
                    <span> شرکای کلیدی </span>
                    <button
                        type="button"
                        data-bs-toggle="modal"
                        data-bs-target="#partnersModal"
                        data-bs-whatever="@fat"
                        class="btn-workbom"
                    >
                        <i class="fas fa-edit"></i>
                    </button>
                </div>
                <div>
                    <ul id="ul">
                        <div
                            v-for="(partners, indexpartners) in partnerss"
                            :key="indexpartners"
                        >
                            <div class="flex justify-start ml-2">
                                <li class="list-item-costumer">
                                    {{ partners.partnerssName }}
                                </li>
                            </div>
                        </div>
                    </ul>
                </div>

                <div
                    class="modal fade"
                    id="partnersModal"
                    tabindex="-1"
                    aria-labelledby="partnersModalLabel"
                    aria-hidden="true"
                >
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="partnersModalLabel">
                                    فرم شرکای کلیدی را پر کنید
                                </h5>
                                <button
                                    type="button"
                                    class="btn-close-workbom"
                                    data-bs-dismiss="modal"
                                    aria-label="Close"
                                >
                                    <i class="fas fa-times close-icon"></i>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="helloa">
                                    <!-- <h1>{{ msg }}</h1> -->
                                    <div class="w-full p-10">
                                        <div
                                            v-for="(
                                                partners, indexpartners
                                            ) in partnerss"
                                            :key="indexpartners"
                                        >
                                            <div
                                                class="flex justify-start ml-2"
                                            >
                                                <div class="d-flex mt-2">
                                                    <div class="kk">
                                                        <input
                                                            class="effect-9"
                                                            v-model="
                                                                partners.partnerssName
                                                            "
                                                            placeholder="شرکای کلیدی"
                                                            :maxlength="
                                                                maxCountListpartners
                                                            "
                                                        />
                                                        <span
                                                            class="focus-border"
                                                        >
                                                            <i></i>
                                                        </span>
                                                    </div>

                                                    <button
                                                        type="button"
                                                        class="btn-delete me-2"
                                                        @click="
                                                            removepartners(
                                                                indexpartners
                                                            )
                                                        "
                                                        v-show="
                                                            indexpartners != 0
                                                        "
                                                    >
                                                        <i
                                                            class="fas fa-trash delete-workbom"
                                                        ></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <button
                                            type="button"
                                            class="btn-add-imput mt-2"
                                            id="btn-add-partners"
                                            @click="addMorepartners()"
                                        >
                                            شرکای کلیدی
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <p>شرکای کلیدی خود را بنویسید</p>
                                <button
                                    type="button"
                                    @click="SendShow"
                                    class="btn-confirm"
                                >
                                    تایید
                                    <i class="fas fa-check"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </section>
        <section class="">
            <section class="d-flex flex-wrap">
                <div
                    class="card card-workbom card-1 col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6"
                >
                    <div class="text-head-bom">
                        <i class="fas fa-dollar-sign blue-icon"></i>
                        <span> جریان درآمد </span>
                        <button
                            type="button"
                            data-bs-toggle="modal"
                            data-bs-target="#IncomeModal"
                            data-bs-whatever="@fat"
                            class="btn-workbom"
                        >
                            <i class="fas fa-edit"></i>
                        </button>
                    </div>

                    <div>
                        <ul id="ul">
                            <div
                                v-for="(Income, indexIncome) in Incomes"
                                :key="indexIncome"
                            >
                                <div class="flex justify-start ml-2">
                                    <li class="list-item-costumer">
                                        {{ Income.IncomesName }}
                                    </li>
                                </div>
                            </div>
                        </ul>
                    </div>

                    <div
                        class="modal fade"
                        id="IncomeModal"
                        tabindex="-1"
                        aria-labelledby="IncomeModalLabel"
                        aria-hidden="true"
                    >
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5
                                        class="modal-title"
                                        id="IncomeModalLabel"
                                    >
                                        فرم جریان درامد خود را بنویسید
                                    </h5>
                                    <button
                                        type="button"
                                        class="btn-close-workbom"
                                        data-bs-dismiss="modal"
                                        aria-label="Close"
                                    >
                                        <i class="fas fa-times close-icon"></i>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="helloa">
                                        <!-- <h1>{{ msg }}</h1> -->
                                        <div class="w-full p-10">
                                            <div
                                                v-for="(
                                                    Income, indexIncome
                                                ) in Incomes"
                                                :key="indexIncome"
                                            >
                                                <div
                                                    class="flex justify-start ml-2"
                                                >
                                                    <div class="d-flex mt-2">
                                                        <div class="kk">
                                                            <input
                                                                class="effect-9"
                                                                v-model="
                                                                    Income.IncomesName
                                                                "
                                                                placeholder="جریان درآمدی"
                                                                :maxlength="
                                                                    maxCountListIncome
                                                                "
                                                            />
                                                            <span
                                                                class="focus-border"
                                                            >
                                                                <i></i>
                                                            </span>
                                                        </div>

                                                        <button
                                                            type="button"
                                                            class="btn-delete me-2"
                                                            @click="
                                                                removeIncome(
                                                                    indexIncome
                                                                )
                                                            "
                                                            v-show="
                                                                indexIncome != 0
                                                            "
                                                        >
                                                            <i
                                                                class="fas fa-trash delete-workbom"
                                                            ></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <button
                                                type="button"
                                                class="btn-add-imput mt-2"
                                                id="btn-add-Income"
                                                @click="addMoreIncome()"
                                            >
                                                جریان درآمدی
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <p>جریان درامدی خود را بنویسید</p>
                                    <button
                                        type="button"
                                        @click="SendShow"
                                        class="btn-confirm"
                                    >
                                        تایید
                                        <i class="fas fa-check"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div
                    class="card card-workbom card-1 col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6"
                >
                    <div class="text-head-bom">
                        <i class="fas fa-file-invoice-dollar blue-icon"></i>
                        <span>ساختار هزینه ها</span>
                        <button
                            type="button"
                            data-bs-toggle="modal"
                            data-bs-target="#ExpenseModal"
                            data-bs-whatever="@fat"
                            class="btn-workbom"
                        >
                            <i class="fas fa-edit"></i>
                        </button>
                    </div>
                    <div>
                        <ul id="ul">
                            <div
                                v-for="(Expense, indexExpense) in Expenses"
                                :key="indexExpense"
                            >
                                <div class="flex justify-start ml-2">
                                    <li class="list-item-costumer">
                                        {{ Expense.ExpensesName }}
                                    </li>
                                </div>
                            </div>
                        </ul>
                    </div>

                    <div
                        class="modal fade"
                        id="ExpenseModal"
                        tabindex="-1"
                        aria-labelledby="ExpenseModalLabel"
                        aria-hidden="true"
                    >
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5
                                        class="modal-title"
                                        id="ExpenseModalLabel"
                                    >
                                        فرم ساختار هزینه ها
                                    </h5>
                                    <button
                                        type="button"
                                        class="btn-close-workbom"
                                        data-bs-dismiss="modal"
                                        aria-label="Close"
                                    >
                                        <i class="fas fa-times close-icon"></i>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="helloa">
                                        <!-- <h1>{{ msg }}</h1> -->
                                        <div class="w-full p-10">
                                            <div
                                                v-for="(
                                                    Expense, indexExpense
                                                ) in Expenses"
                                                :key="indexExpense"
                                            >
                                                <div
                                                    class="flex justify-start ml-2"
                                                >
                                                    <div class="d-flex mt-2">
                                                        <div class="kk">
                                                            <input
                                                                class="effect-9"
                                                                v-model="
                                                                    Expense.ExpensesName
                                                                "
                                                                placeholder="ساختار هزینه ها"
                                                                :maxlength="
                                                                    maxCountListExpense
                                                                "
                                                            />
                                                            <span
                                                                class="focus-border"
                                                            >
                                                                <i></i>
                                                            </span>
                                                        </div>

                                                        <button
                                                            type="button"
                                                            class="btn-delete me-2"
                                                            @click="
                                                                removeExpense(
                                                                    indexExpense
                                                                )
                                                            "
                                                            v-show="
                                                                indexExpense !=
                                                                0
                                                            "
                                                        >
                                                            <i
                                                                class="fas fa-trash delete-workbom"
                                                            ></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <button
                                                type="button"
                                                class="btn-add-imput mt-2"
                                                id="btn-add-Expense"
                                                @click="addMoreExpense()"
                                            >
                                                ساختار هزینه ها
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button
                                        type="button"
                                        @click="SendShow"
                                        class="btn-confirm"
                                    >
                                        تایید
                                        <i class="fas fa-check"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </section>
    </main>
</template>
