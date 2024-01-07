@extends('frontend.layouts.app')
@section('title','Services')
@section('content')
    <div class="container wallet-header">
        <div class="row position-relative">
            <div class="col-lg-5">
                <img class="w-100" src="{{ asset('images/userpanel/payment/card.png') }}" alt="credit card">
            </div>
            <div class="col-lg-6">
                <div class="pt-3 container">
                    <h4 class="font-weight-bold">
                        Choose Financial Operation.
                    </h4>
                    <select id="operationType" class="form-control w-50 border-1 rounded-2"
                            style="background-color: #74BBFC; border-color: #707070; color: white;">
                        <option value="deposit/amount">Deposit</option>
                        <option value="withdraw/amount">Withdraw</option>
                    </select>
                    <br>
                    <h5 class="font-weight-bold pr-lg-5" style="z-index: 1;position: relative">
                        choose the financial operation that you are going to do.
                    </h5>
                    <button type="button" onclick="window.location.href += `/${$('#operationType').val()}`"
                            class="btn btn-primary shadow-2 pl-5 pr-5 pt-2 pb-2"
                            style="background: linear-gradient(90deg, #00AEFF, #0087FF)">Continue
                    </button>
                </div>
            </div>
            <svg style="z-index:0;position: absolute;top: 0;right: 0;width: fit-content; height: 250px;" id="Group_3657"
                 data-name="Group 3657" xmlns="http://www.w3.org/2000/svg" width="196.41" height="330.684"
                 viewBox="0 0 196.41 330.684">
                <g id="Group_57" data-name="Group 57" transform="translate(143.371 255.385)">
                    <g id="Group_26" data-name="Group 26">
                        <g id="Group_25" data-name="Group 25">
                            <g id="Group_24" data-name="Group 24">
                                <g id="Group_23" data-name="Group 23">
                                    <path id="Path_48" data-name="Path 48"
                                          d="M410.675,411.676l-8.348-6.564L414.522,389.4l12.313,9.472-.693,1.023c-3.125,4.523-16.2,22.778-19.334,24.994C403.32,427.361,410.675,411.676,410.675,411.676Z"
                                          transform="translate(-402.327 -389.398)" fill="#7467f0"/>
                                </g>
                            </g>
                        </g>
                    </g>
                    <g id="Group_31" data-name="Group 31" transform="translate(3.424 9.134)">
                        <g id="Group_30" data-name="Group 30">
                            <g id="Group_29" data-name="Group 29">
                                <g id="Group_28" data-name="Group 28">
                                    <g id="Group_27" data-name="Group 27">
                                        <path id="Path_49" data-name="Path 49"
                                              d="M405.348,423.576c-.147-.116,4.331-6.06,10-13.273s10.391-12.969,10.54-12.852-4.331,6.057-10,13.273S405.5,423.691,405.348,423.576Z"
                                              transform="translate(-405.345 -397.449)" fill="#263238"/>
                                    </g>
                                </g>
                            </g>
                        </g>
                    </g>
                    <g id="Group_36" data-name="Group 36" transform="translate(7.409 23.463)">
                        <g id="Group_35" data-name="Group 35">
                            <g id="Group_34" data-name="Group 34">
                                <g id="Group_33" data-name="Group 33">
                                    <g id="Group_32" data-name="Group 32">
                                        <path id="Path_50" data-name="Path 50"
                                              d="M411.283,410.51c-.03.188-.571.256-1.215.251s-1.183-.086-1.209-.273.515-.414,1.216-.406S411.314,410.327,411.283,410.51Z"
                                              transform="translate(-408.858 -410.081)" fill="#263238"/>
                                    </g>
                                </g>
                            </g>
                        </g>
                    </g>
                    <g id="Group_41" data-name="Group 41" transform="translate(6.947 24.687)">
                        <g id="Group_40" data-name="Group 40">
                            <g id="Group_39" data-name="Group 39">
                                <g id="Group_38" data-name="Group 38">
                                    <g id="Group_37" data-name="Group 37">
                                        <path id="Path_51" data-name="Path 51"
                                              d="M411.1,411.8c-.053.183-.652.166-1.359.071s-1.29-.239-1.293-.429.621-.349,1.384-.245S411.158,411.618,411.1,411.8Z"
                                              transform="translate(-408.451 -411.16)" fill="#263238"/>
                                    </g>
                                </g>
                            </g>
                        </g>
                    </g>
                    <g id="Group_46" data-name="Group 46" transform="translate(19.254 7.204)">
                        <g id="Group_45" data-name="Group 45">
                            <g id="Group_44" data-name="Group 44">
                                <g id="Group_43" data-name="Group 43">
                                    <g id="Group_42" data-name="Group 42">
                                        <path id="Path_52" data-name="Path 52"
                                              d="M420.255,402.344c-.09.026-.286-.33-.51-.946a6.983,6.983,0,0,1-.442-2.565,4.022,4.022,0,0,1,.923-2.491c.471-.524.906-.648.943-.574.058.086-.25.344-.558.861a4.768,4.768,0,0,0-.628,2.231,12.594,12.594,0,0,0,.228,2.417C420.312,401.911,420.347,402.321,420.255,402.344Z"
                                              transform="translate(-419.299 -395.749)" fill="#263238"/>
                                    </g>
                                </g>
                            </g>
                        </g>
                    </g>
                    <g id="Group_51" data-name="Group 51" transform="translate(8.22 21.569)">
                        <g id="Group_50" data-name="Group 50">
                            <g id="Group_49" data-name="Group 49">
                                <g id="Group_48" data-name="Group 48">
                                    <g id="Group_47" data-name="Group 47">
                                        <path id="Path_53" data-name="Path 53"
                                              d="M409.582,409.549c-.07-.177.273-.478.717-.762s.867-.466,1-.328-.122.581-.631.9S409.649,409.721,409.582,409.549Z"
                                              transform="translate(-409.573 -408.412)" fill="#263238"/>
                                    </g>
                                </g>
                            </g>
                        </g>
                    </g>
                    <g id="Group_56" data-name="Group 56" transform="translate(7.573 19.957)">
                        <g id="Group_55" data-name="Group 55">
                            <g id="Group_54" data-name="Group 54">
                                <g id="Group_53" data-name="Group 53">
                                    <g id="Group_52" data-name="Group 52">
                                        <path id="Path_54" data-name="Path 54"
                                              d="M409.044,408.859c-.136-.129.078-.639.482-1.138s.856-.817,1.012-.711-.061.616-.482,1.139S409.18,408.99,409.044,408.859Z"
                                              transform="translate(-409.003 -406.99)" fill="#263238"/>
                                    </g>
                                </g>
                            </g>
                        </g>
                    </g>
                </g>
                <g id="Group_66" data-name="Group 66" transform="translate(74.544 142.634)">
                    <g id="Group_59" data-name="Group 59">
                        <g id="Group_58" data-name="Group 58">
                            <path id="Path_55" data-name="Path 55"
                                  d="M363.519,290.006s-24.909,66.184-21.553,78.549S412.5,430.016,412.5,430.016l18.239-26.248s-52.4-41.467-52.562-43.758,20.8-57.274,20.8-57.274Z"
                                  transform="translate(-341.655 -290.006)" fill="#263238"/>
                        </g>
                    </g>
                    <g id="Group_62" data-name="Group 62" transform="translate(13.088 43.578)">
                        <g id="Group_61" data-name="Group 61">
                            <g id="Group_60" data-name="Group 60">
                                <path id="Path_56" data-name="Path 56"
                                      d="M409.8,404.667a.858.858,0,0,1-.236-.13l-.658-.432-2.5-1.71c-2.152-1.509-5.255-3.706-9.029-6.5-7.56-5.58-17.822-13.545-28.714-22.871-2.728-2.327-5.365-4.632-7.894-6.873l-3.711-3.317a13.992,13.992,0,0,1-3.2-3.632,6.675,6.675,0,0,1-.471-4.6c.292-1.462.661-2.837,1.011-4.178.717-2.672,1.432-5.142,2.085-7.4l3.1-10.679q.512-1.838.813-2.912c.084-.3.154-.551.212-.757a.136.136,0,1,1,.06.014c-.042.21-.092.464-.154.773-.146.676-.381,1.67-.7,2.944-.647,2.547-1.657,6.212-2.918,10.736-.627,2.262-1.318,4.74-2.011,7.409-.337,1.333-.7,2.721-.973,4.146a6.142,6.142,0,0,0,.44,4.239,13.558,13.558,0,0,0,3.1,3.462l3.716,3.3c2.534,2.234,5.169,4.532,7.9,6.856,10.881,9.317,21.089,17.326,28.577,22.989l8.909,6.656,2.429,1.8.623.482C409.737,404.6,409.8,404.659,409.8,404.667Z"
                                      transform="translate(-353.192 -328.421)" fill="#455a64"/>
                            </g>
                        </g>
                    </g>
                    <g id="Group_65" data-name="Group 65" transform="translate(63.609 106.857)">
                        <g id="Group_64" data-name="Group 64">
                            <g id="Group_63" data-name="Group 63">
                                <path id="Path_57" data-name="Path 57"
                                      d="M397.73,405.166c-.134-.1,3.328-4.877,7.731-10.665s8.082-10.4,8.215-10.3-3.327,4.876-7.732,10.665S397.864,405.267,397.73,405.166Z"
                                      transform="translate(-397.727 -384.203)" fill="#455a64"/>
                            </g>
                        </g>
                    </g>
                </g>
                <g id="Group_68" data-name="Group 68" transform="translate(128.798 16.775)">
                    <g id="Group_67" data-name="Group 67">
                        <path id="Path_58" data-name="Path 58"
                              d="M401.08,179.059c2.222,4.453,3.4,8.306,7.81,10.6,1.989,1.033,4.414,1.623,5.613,3.518,1.306,2.061.691,5.048,2.34,6.846,2.4,2.615,7.3.5,10,2.807,2.4,2.062,1.63,6.487,4.223,8.3,1.459,1.022,3.446.794,5.107,1.437,2.723,1.055,4.011,4.2,4.371,7.092a12.373,12.373,0,0,1-.858,6.861,7.013,7.013,0,0,1-5.332,4.075c-3.088.324-6.586-1.806-9.087.035a12.375,12.375,0,0,0-2.082,2.546,7.8,7.8,0,0,1-12.809-.809c-1.724-2.873-1.612-6.838-4.139-9.04-1.32-1.151-3.106-1.563-4.747-2.178s-3.339-1.631-3.832-3.312a14.6,14.6,0,0,0-2.375-4.09c-1.264-1.889-2.947.419-4.617-.512s-1.037-2.751-1.178-4.658"
                              transform="translate(-389.48 -179.059)" fill="#263238"/>
                    </g>
                </g>
                <g id="Group_72" data-name="Group 72" transform="translate(9.922 73.871)">
                    <g id="Group_71" data-name="Group 71">
                        <g id="Group_70" data-name="Group 70">
                            <g id="Group_69" data-name="Group 69">
                                <path id="Path_59" data-name="Path 59"
                                      d="M385.828,236.589l-21.53-7.2s-9.514,27.41-12.431,27.675c-16.155,1.474-33.441-3.883-39.5-6-.615-.691-1.317-1.52-2.1-2.537a9.677,9.677,0,0,1-1.521-2.9,14.812,14.812,0,0,1-.864-3.992,1.267,1.267,0,0,0-2.178-1c-.7.9-.878,4.366.717,8.091s-4.05.761-6.126-.281-8.652-3.967-9.478-3.584c-1.212.565-.832,1.966,1.267,2.959,2.124,1.006,8.179,4.415,7.574,5.485-.593,1.054-11.091-4.4-11.091-4.4s-2.056-1.528-2.794-.315c-1.332,2.188,10.254,7.163,11.369,7.608.774.31.16,1.5-.655,1.119-.837-.388-10.344-5.682-11.722-3.467-1.056,1.7,9.493,4.18,10.855,6.373s-7.809-2.694-8.752-1.029c-.352.621-.527,1.131,5.145,3.177a120.59,120.59,0,0,0,12.642,3.227l-.02.059s56.658,25.337,68.878.912C386.477,240.656,385.828,236.589,385.828,236.589Z"
                                      transform="translate(-284.69 -229.39)" fill="#e68ca3"/>
                            </g>
                        </g>
                    </g>
                </g>
                <g id="Group_97" data-name="Group 97" transform="translate(77.079 58.377)">
                    <g id="Group_76" data-name="Group 76">
                        <g id="Group_75" data-name="Group 75">
                            <g id="Group_74" data-name="Group 74">
                                <g id="Group_73" data-name="Group 73">
                                    <path id="Path_60" data-name="Path 60"
                                          d="M399.157,215.732h0l9.4.169,7.47,21.4-6.083,24.525c-1.778,7.166,6.29,21.5,6.083,29.406l-52.75,8.543-1.112-35.225-.026-1.181-18.255-9.109,6.024-14.756c9.268-21.711,25.453-23.033,25.453-23.033Z"
                                          transform="translate(-343.889 -215.732)" fill="#7467f0"/>
                                </g>
                            </g>
                        </g>
                    </g>
                    <g id="Group_80" data-name="Group 80" opacity="0.2">
                        <g id="Group_79" data-name="Group 79">
                            <g id="Group_78" data-name="Group 78">
                                <g id="Group_77" data-name="Group 77">
                                    <path id="Path_61" data-name="Path 61"
                                          d="M399.157,215.732h0l9.4.169,7.47,21.4-6.083,24.525c-1.778,7.166,6.29,21.5,6.083,29.406l-52.75,8.543-1.112-35.225-.026-1.181-18.255-9.109,6.024-14.756c9.268-21.711,25.453-23.033,25.453-23.033Z"
                                          transform="translate(-343.889 -215.732)" fill="#7467f0"/>
                                </g>
                            </g>
                        </g>
                    </g>
                    <g id="Group_83" data-name="Group 83" transform="translate(27.416 0.226)">
                        <g id="Group_82" data-name="Group 82">
                            <g id="Group_81" data-name="Group 81">
                                <path id="Path_62" data-name="Path 62"
                                      d="M405.7,215.936a1.073,1.073,0,0,1-.305.124,9.543,9.543,0,0,1-.928.254,21.791,21.791,0,0,1-3.649.364l.109-.216,3.606,5.839.242.393-.457-.079a22.793,22.793,0,0,0-6.316-.2l.22-.273c.246,2.221.214,4.687,1.015,7.1l.159.48-.488-.125a25.515,25.515,0,0,1-6.873-2.515l.446-.191c-.425,2.111-.87,4.322-1.326,6.584l-.1.487-.388-.31a31.252,31.252,0,0,1-5.084-5.114l.425.05-6.035,4.759-.374.3-.094-.466c-.43-2.105-.845-4.142-1.243-6.1l.365.205q-3.419,1.2-6.448,2.26l-.448.158.121-.457c.689-2.568,1.314-4.905,1.872-6.989l.166.255-5.6-.964-.234-.041.132-.192,2.453-3.585c.264-.371.478-.673.652-.917.151-.2.233-.305.245-.3a1.407,1.407,0,0,1-.177.341l-.588.96-2.333,3.664-.1-.233,5.622.855.222.034-.057.221-1.784,7.013-.327-.3,6.43-2.311.3-.108.066.313c.408,1.952.834,3.986,1.273,6.088l-.469-.17,6.023-4.775.238-.188.188.239a31,31,0,0,0,4.986,5.015l-.486.176c.461-2.261.911-4.472,1.342-6.582l.083-.407.363.217a25.32,25.32,0,0,0,6.691,2.475l-.33.355c-.817-2.53-.758-5.046-.98-7.221l-.025-.248.246-.025a22.909,22.909,0,0,1,6.441.287l-.216.313c-1.366-2.312-2.541-4.3-3.488-5.906l-.122-.208.233-.007a25.75,25.75,0,0,0,3.641-.228C405.266,216.027,405.694,215.9,405.7,215.936Z"
                                      transform="translate(-368.057 -215.931)" fill="#7467f0"/>
                            </g>
                        </g>
                    </g>
                    <g id="Group_86" data-name="Group 86" transform="translate(14.256 8.406)">
                        <g id="Group_85" data-name="Group 85">
                            <g id="Group_84" data-name="Group 84">
                                <path id="Path_63" data-name="Path 63"
                                      d="M417.674,223.961c-.011.025-.365-.176-1.1-.389a6.534,6.534,0,0,0-3.33-.053l.085-.127c.221,1.248.559,2.746,1.024,4.462s1.038,3.652,1.545,5.832l.075.324-.322-.093c-2.691-.778-5.856-1.374-9.186-2.5l.315-.248c.343,3.238.324,6.858.52,10.661l.016.331-.332-.049a55.519,55.519,0,0,1-8.91-2.349c-.357-.105-.787-.247-.884-.091a2.446,2.446,0,0,0-.5.925q-.465,1.126-.937,2.273-.948,2.294-1.922,4.654l-.194.469-.318-.4-6.033-7.488-.448-.557.408.059-9.7,6.669-.322.221-.128-.369q-1.642-4.719-3.177-9.135l.425.144a55.373,55.373,0,0,1-10.794,5.434l-.4.151.06-.425c.693-4.917,1.314-9.321,1.853-13.14l.277.216a20.343,20.343,0,0,1-8.676,1.4l-.2-.011.067-.182c.879-2.355,1.562-4.183,2.042-5.467l.543-1.4a2.476,2.476,0,0,1,.209-.465,2.646,2.646,0,0,1-.136.491l-.474,1.426c-.449,1.294-1.089,3.138-1.913,5.513l-.128-.192A20.353,20.353,0,0,0,365.175,229l.323-.132-.045.348c-.507,3.822-1.094,8.232-1.746,13.153l-.345-.275a55.527,55.527,0,0,0,10.662-5.432l.305-.2.12.345q1.545,4.4,3.2,9.127l-.45-.147,9.7-6.678.233-.16.176.22.449.557,6.026,7.493-.512.074q.98-2.357,1.931-4.65.475-1.145.943-2.272a2.775,2.775,0,0,1,.687-1.162.86.86,0,0,1,.412-.183,1.414,1.414,0,0,1,.386.02,4.842,4.842,0,0,1,.619.164,55.454,55.454,0,0,0,8.821,2.363l-.317.282c-.177-3.833-.136-7.429-.453-10.646l-.037-.37.352.121c3.29,1.141,6.431,1.762,9.144,2.579l-.247.23c-.478-2.169-1.032-4.111-1.465-5.84s-.751-3.242-.944-4.5l-.016-.106.1-.023a6.434,6.434,0,0,1,3.416.161A4.172,4.172,0,0,1,417.674,223.961Z"
                                      transform="translate(-356.456 -223.142)" fill="#7467f0"/>
                            </g>
                        </g>
                    </g>
                    <g id="Group_91" data-name="Group 91" transform="translate(13.729 18.992)">
                        <g id="Group_90" data-name="Group 90">
                            <g id="Group_89" data-name="Group 89">
                                <g id="Group_88" data-name="Group 88">
                                    <g id="Group_87" data-name="Group 87">
                                        <path id="Path_64" data-name="Path 64"
                                              d="M360.833,260.863a3.227,3.227,0,0,1-1.132-.6,9.111,9.111,0,0,1-2.439-2.514,8.026,8.026,0,0,1-1.242-5.038,11.153,11.153,0,0,1,2.049-6.017,11.031,11.031,0,0,1,3.74-3.343l-.16.22c.436-3.234.832-6.015,1.136-7.983a19.855,19.855,0,0,1,.583-3.116,20.211,20.211,0,0,1-.225,3.166c-.2,1.982-.524,4.772-.921,8.013l-.017.141-.143.079a10.907,10.907,0,0,0-5.484,8.873,7.775,7.775,0,0,0,1.048,4.777,9.992,9.992,0,0,0,2.217,2.551C360.468,260.588,360.853,260.823,360.833,260.863Z"
                                              transform="translate(-355.991 -232.474)" fill="#7467f0"/>
                                    </g>
                                </g>
                            </g>
                        </g>
                    </g>
                    <g id="Group_96" data-name="Group 96" transform="translate(18.743 19.985)">
                        <g id="Group_95" data-name="Group 95">
                            <g id="Group_94" data-name="Group 94">
                                <g id="Group_93" data-name="Group 93">
                                    <g id="Group_92" data-name="Group 92">
                                        <path id="Path_65" data-name="Path 65"
                                              d="M362.229,236.983c-.151.074-.67-.68-1.162-1.681s-.766-1.873-.615-1.948.67.68,1.161,1.681S362.379,236.909,362.229,236.983Z"
                                              transform="translate(-360.412 -233.349)" fill="#7467f0"/>
                                    </g>
                                </g>
                            </g>
                        </g>
                    </g>
                </g>
                <g id="Group_101" data-name="Group 101" transform="translate(105.035 10.464)">
                    <g id="Group_100" data-name="Group 100">
                        <g id="Group_99" data-name="Group 99">
                            <g id="Group_98" data-name="Group 98">
                                <path id="Path_66" data-name="Path 66"
                                      d="M395.211,221.717l1.622-37.07L382.113,173.5l-13.381,6.542s-.447,16.8,0,24.087,7.792,8.063,7.792,8.063-.171,4.27-.34,8.756a9.52,9.52,0,0,0,9.605,9.877h0A9.521,9.521,0,0,0,395.211,221.717Z"
                                      transform="translate(-368.533 -173.496)" fill="#e68ca3"/>
                            </g>
                        </g>
                    </g>
                </g>
                <g id="Group_111" data-name="Group 111" transform="translate(105.771 27.106)">
                    <g id="Group_105" data-name="Group 105" transform="translate(0.919 1.214)">
                        <g id="Group_104" data-name="Group 104">
                            <g id="Group_103" data-name="Group 103">
                                <g id="Group_102" data-name="Group 102">
                                    <path id="Path_67" data-name="Path 67"
                                          d="M369.992,190.168a.932.932,0,1,0,.934-.932A.933.933,0,0,0,369.992,190.168Z"
                                          transform="translate(-369.992 -189.236)" fill="#263238"/>
                                </g>
                            </g>
                        </g>
                    </g>
                    <g id="Group_110" data-name="Group 110">
                        <g id="Group_109" data-name="Group 109">
                            <g id="Group_108" data-name="Group 108">
                                <g id="Group_107" data-name="Group 107">
                                    <g id="Group_106" data-name="Group 106">
                                        <path id="Path_68" data-name="Path 68"
                                              d="M369.2,189.3c.12.121.809-.465,1.813-.518,1-.069,1.758.429,1.863.295.051-.06-.073-.282-.4-.508a2.474,2.474,0,0,0-2.934.178C369.236,189.008,369.14,189.243,369.2,189.3Z"
                                              transform="translate(-369.182 -188.166)" fill="#263238"/>
                                    </g>
                                </g>
                            </g>
                        </g>
                    </g>
                </g>
                <g id="Group_121" data-name="Group 121" transform="translate(116.9 27.106)">
                    <g id="Group_115" data-name="Group 115" transform="translate(0.596 1.214)">
                        <g id="Group_114" data-name="Group 114">
                            <g id="Group_113" data-name="Group 113">
                                <g id="Group_112" data-name="Group 112">
                                    <path id="Path_69" data-name="Path 69"
                                          d="M379.518,190.168a.932.932,0,1,0,.932-.932A.932.932,0,0,0,379.518,190.168Z"
                                          transform="translate(-379.518 -189.236)" fill="#263238"/>
                                </g>
                            </g>
                        </g>
                    </g>
                    <g id="Group_120" data-name="Group 120">
                        <g id="Group_119" data-name="Group 119">
                            <g id="Group_118" data-name="Group 118">
                                <g id="Group_117" data-name="Group 117">
                                    <g id="Group_116" data-name="Group 116">
                                        <path id="Path_70" data-name="Path 70"
                                              d="M379.009,189.3c.12.121.809-.465,1.813-.518,1-.069,1.757.429,1.863.295.051-.06-.074-.282-.4-.508a2.475,2.475,0,0,0-2.934.178C379.048,189.008,378.95,189.243,379.009,189.3Z"
                                              transform="translate(-378.993 -188.166)" fill="#263238"/>
                                    </g>
                                </g>
                            </g>
                        </g>
                    </g>
                </g>
                <g id="Group_125" data-name="Group 125" transform="translate(111.758 37.666)">
                    <g id="Group_124" data-name="Group 124">
                        <g id="Group_123" data-name="Group 123">
                            <g id="Group_122" data-name="Group 122">
                                <path id="Path_71" data-name="Path 71"
                                      d="M379.312,197.475a18.445,18.445,0,0,1-4.853,1.671,2.825,2.825,0,0,0,3.327.945C379.952,199.238,379.312,197.475,379.312,197.475Z"
                                      transform="translate(-374.459 -197.475)" fill="#fff"/>
                            </g>
                        </g>
                    </g>
                </g>
                <g id="Group_129" data-name="Group 129" transform="translate(113.021 45.896)">
                    <g id="Group_128" data-name="Group 128">
                        <g id="Group_127" data-name="Group 127">
                            <g id="Group_126" data-name="Group 126">
                                <path id="Path_72" data-name="Path 72"
                                      d="M375.573,207.99a18.19,18.19,0,0,0,9.653-3.26s-2.188,5.349-9.494,5.048Z"
                                      transform="translate(-375.573 -204.73)" fill="#d78776"/>
                            </g>
                        </g>
                    </g>
                </g>
                <g id="Group_133" data-name="Group 133" transform="translate(102.054 5.57)">
                    <g id="Group_132" data-name="Group 132">
                        <g id="Group_131" data-name="Group 131">
                            <g id="Group_130" data-name="Group 130">
                                <path id="Path_73" data-name="Path 73"
                                      d="M418.383,206.172a5.233,5.233,0,0,1-2.641-.6,7.35,7.35,0,0,1-2.879-2.792,30.233,30.233,0,0,1-2.153-4.616c-1.36-3.386-2.387-6.53-3.082-8.82-.11-.363-.209-.694-.3-1.011-.061-.39-.124-.738-.191-.994-3.975-15.194-17.329-18.027-19.971-18.027-2.834,0-7.79-1.558-15.015,5.95a16.334,16.334,0,0,0-2.741,3.783,16.279,16.279,0,0,0-3.219,6.861,8.255,8.255,0,0,0-.169,3.617c.137.006.16-1.376.726-3.485a17.557,17.557,0,0,1,1.4-3.587,13.841,13.841,0,0,0,.741,8.391l2.592-.712,9.278-3.157c-.844-2.875.4-6.442,1.1-8.106l.069-.064a14.5,14.5,0,0,0,12.266,11.911L395.9,214.58c12.334-2.636,12.054-19.142,11.976-22.494.558,1.89,1.286,4.06,2.2,6.335a27.429,27.429,0,0,0,2.256,4.7,7.539,7.539,0,0,0,3.2,2.887,5.03,5.03,0,0,0,2.877.425,1.879,1.879,0,0,0,.994-.382C419.387,206,419.033,206.127,418.383,206.172Z"
                                      transform="translate(-365.905 -169.182)" fill="#263238"/>
                            </g>
                        </g>
                    </g>
                </g>
                <g id="Group_138" data-name="Group 138" transform="translate(110.722 27.958)">
                    <g id="Group_137" data-name="Group 137">
                        <g id="Group_136" data-name="Group 136">
                            <g id="Group_135" data-name="Group 135">
                                <g id="Group_134" data-name="Group 134">
                                    <path id="Path_74" data-name="Path 74"
                                          d="M376.12,197.675a6.855,6.855,0,0,0-1.644-.205c-.255-.012-.507-.05-.56-.238a1.425,1.425,0,0,1,.142-.811q.327-.989.689-2.081c.478-1.48.888-2.827,1.166-3.808a6.726,6.726,0,0,0,.37-1.614,6.758,6.758,0,0,0-.642,1.527c-.348.959-.8,2.292-1.28,3.771q-.344,1.1-.658,2.091a1.63,1.63,0,0,0-.1,1.049.629.629,0,0,0,.428.362,1.707,1.707,0,0,0,.436.039A6.692,6.692,0,0,0,376.12,197.675Z"
                                          transform="translate(-373.546 -188.917)" fill="#263238"/>
                                </g>
                            </g>
                        </g>
                    </g>
                </g>
                <g id="Group_148" data-name="Group 148" transform="translate(134.09 30.54)">
                    <g id="Group_142" data-name="Group 142">
                        <g id="Group_141" data-name="Group 141">
                            <g id="Group_140" data-name="Group 140">
                                <g id="Group_139" data-name="Group 139">
                                    <path id="Path_75" data-name="Path 75"
                                          d="M394.164,197.066a9.053,9.053,0,0,1,.391-3.6,3.394,3.394,0,0,1,2.62-2.263,2.872,2.872,0,0,1,2.959,2.391,3.536,3.536,0,0,1-1.8,3.5,4.633,4.633,0,0,1-4.046.113"
                                          transform="translate(-394.146 -191.193)" fill="#e5baab"/>
                                </g>
                            </g>
                        </g>
                    </g>
                    <g id="Group_147" data-name="Group 147" transform="translate(2.126 1.528)">
                        <g id="Group_146" data-name="Group 146">
                            <g id="Group_145" data-name="Group 145">
                                <g id="Group_144" data-name="Group 144">
                                    <g id="Group_143" data-name="Group 143">
                                        <path id="Path_76" data-name="Path 76"
                                              d="M396.037,195.823c.044-.081.394.1.909-.058a1.634,1.634,0,0,0,1.091-1.548,1.237,1.237,0,0,0-.26-.971,1.1,1.1,0,0,0-.794-.237c-.547.049-.93.194-.962.1-.023-.061.246-.34.9-.525a1.434,1.434,0,0,1,1.222.237,1.67,1.67,0,0,1,.5,1.435,2.272,2.272,0,0,1-.545,1.361,1.688,1.688,0,0,1-1.072.569C396.308,196.257,395.978,195.868,396.037,195.823Z"
                                              transform="translate(-396.02 -192.54)" fill="#d78776"/>
                                    </g>
                                </g>
                            </g>
                        </g>
                    </g>
                </g>
                <g id="Group_183" data-name="Group 183" transform="translate(111.652 314.315)">
                    <g id="Group_152" data-name="Group 152">
                        <g id="Group_151" data-name="Group 151">
                            <g id="Group_150" data-name="Group 150">
                                <g id="Group_149" data-name="Group 149">
                                    <path id="Path_77" data-name="Path 77"
                                          d="M387.784,452.092V441.474l19.891-.128.164,15.535-1.232.087c-5.488.34-27.922,1.342-31.6.252C370.908,456.006,387.784,452.092,387.784,452.092Z"
                                          transform="translate(-374.366 -441.346)" fill="#e8505b"/>
                                </g>
                            </g>
                        </g>
                    </g>
                    <g id="Group_157" data-name="Group 157" transform="translate(0.171 14.562)">
                        <g id="Group_156" data-name="Group 156">
                            <g id="Group_155" data-name="Group 155">
                                <g id="Group_154" data-name="Group 154">
                                    <g id="Group_153" data-name="Group 153">
                                        <path id="Path_78" data-name="Path 78"
                                              d="M374.517,454.523c0-.187,7.442-.34,16.617-.34s16.618.153,16.618.34-7.438.34-16.618.34S374.517,454.71,374.517,454.523Z"
                                              transform="translate(-374.517 -454.183)" fill="#263238"/>
                                    </g>
                                </g>
                            </g>
                        </g>
                    </g>
                    <g id="Group_162" data-name="Group 162" transform="translate(11.555 10.96)">
                        <g id="Group_161" data-name="Group 161">
                            <g id="Group_160" data-name="Group 160">
                                <g id="Group_159" data-name="Group 159">
                                    <g id="Group_158" data-name="Group 158">
                                        <path id="Path_79" data-name="Path 79"
                                              d="M386.065,452.96c-.167.093-.554-.29-.948-.8s-.662-.984-.532-1.121.644.15,1.071.706S386.229,452.872,386.065,452.96Z"
                                              transform="translate(-384.552 -451.007)" fill="#263238"/>
                                    </g>
                                </g>
                            </g>
                        </g>
                    </g>
                    <g id="Group_167" data-name="Group 167" transform="translate(10.397 11.286)">
                        <g id="Group_166" data-name="Group 166">
                            <g id="Group_165" data-name="Group 165">
                                <g id="Group_164" data-name="Group 164">
                                    <g id="Group_163" data-name="Group 163">
                                        <path id="Path_80" data-name="Path 80"
                                              d="M384.933,453.622c-.177.07-.533-.412-.9-1.024s-.608-1.162-.462-1.281.658.271,1.049.935S385.107,453.555,384.933,453.622Z"
                                              transform="translate(-383.531 -451.295)" fill="#263238"/>
                                    </g>
                                </g>
                            </g>
                        </g>
                    </g>
                    <g id="Group_172" data-name="Group 172" transform="translate(27.396 11.091)">
                        <g id="Group_171" data-name="Group 171">
                            <g id="Group_170" data-name="Group 170">
                                <g id="Group_169" data-name="Group 169">
                                    <g id="Group_168" data-name="Group 168">
                                        <path id="Path_81" data-name="Path 81"
                                              d="M398.534,454.863c-.075-.055.083-.43.429-.987a7,7,0,0,1,1.742-1.932,4.019,4.019,0,0,1,2.529-.814c.7.045,1.07.312,1.035.386-.033.1-.424.016-1.022.094a4.759,4.759,0,0,0-2.143.885,12.739,12.739,0,0,0-1.759,1.673C398.911,454.64,398.61,454.92,398.534,454.863Z"
                                              transform="translate(-398.516 -451.123)" fill="#263238"/>
                                    </g>
                                </g>
                            </g>
                        </g>
                    </g>
                    <g id="Group_177" data-name="Group 177" transform="translate(12.993 10.829)">
                        <g id="Group_176" data-name="Group 176">
                            <g id="Group_175" data-name="Group 175">
                                <g id="Group_174" data-name="Group 174">
                                    <g id="Group_173" data-name="Group 173">
                                        <path id="Path_82" data-name="Path 82"
                                              d="M385.835,450.98c.1-.164.543-.079,1.043.093s.9.392.873.581-.532.262-1.1.061S385.74,451.14,385.835,450.98Z"
                                              transform="translate(-385.819 -450.892)" fill="#263238"/>
                                    </g>
                                </g>
                            </g>
                        </g>
                    </g>
                    <g id="Group_182" data-name="Group 182" transform="translate(13.32 9.566)">
                        <g id="Group_181" data-name="Group 181">
                            <g id="Group_180" data-name="Group 180">
                                <g id="Group_179" data-name="Group 179">
                                    <g id="Group_178" data-name="Group 178">
                                        <path id="Path_83" data-name="Path 83"
                                              d="M386.108,450.1c.017-.187.551-.334,1.192-.324s1.172.168,1.184.356-.522.332-1.193.324S386.09,450.292,386.108,450.1Z"
                                              transform="translate(-386.108 -449.779)" fill="#263238"/>
                                    </g>
                                </g>
                            </g>
                        </g>
                    </g>
                </g>
                <g id="Group_188" data-name="Group 188" transform="translate(96.408 134.129)">
                    <g id="Group_187" data-name="Group 187">
                        <g id="Group_186" data-name="Group 186">
                            <g id="Group_185" data-name="Group 185">
                                <g id="Group_184" data-name="Group 184">
                                    <path id="Path_84" data-name="Path 84"
                                          d="M371.826,289.194l-10.9,1.82,6.273,7.717c1.8,36.334,1.367,71.528,3.03,89.078.253,2.662,11.5,86.257,10.387,84.3l33.128,1.382-9.888-83.951,4.687-74.56a39.475,39.475,0,0,0,4.146-29.119l-.821-3.352"
                                          transform="translate(-360.928 -282.509)" fill="#455a64"/>
                                </g>
                            </g>
                        </g>
                    </g>
                </g>
                <g id="Group_226" data-name="Group 226" transform="translate(0 57.348)">
                    <g id="Group_193" data-name="Group 193">
                        <g id="Group_190" data-name="Group 190">
                            <g id="Group_189" data-name="Group 189">
                                <path id="Rectangle_34" data-name="Rectangle 34"
                                      d="M7.759,0H104.08a7.759,7.759,0,0,1,7.759,7.759v156.47a7.759,7.759,0,0,1-7.759,7.759H7.758A7.758,7.758,0,0,1,0,164.23V7.759A7.759,7.759,0,0,1,7.759,0Z"
                                      transform="translate(0 107.373) rotate(-73.753)" fill="#4f63ff"/>
                            </g>
                        </g>
                    </g>
                    <g id="Group_195" data-name="Group 195" transform="translate(141.536 50.813)">
                        <g id="Group_194" data-name="Group 194">
                            <path id="Path_85" data-name="Path 85"
                                  d="M423.979,274.812a11.87,11.87,0,1,1-8.076-14.719A11.873,11.873,0,0,1,423.979,274.812Z"
                                  transform="translate(-400.709 -259.617)" fill="#fff"/>
                        </g>
                    </g>
                    <g id="Group_197" data-name="Group 197" transform="translate(154.682 54.229)">
                        <g id="Group_196" data-name="Group 196">
                            <path id="Path_86" data-name="Path 86"
                                  d="M424.775,287.549a12.543,12.543,0,0,1-3.5-.5,12.383,12.383,0,1,1,3.5.5Zm-.034-23.753a11.307,11.307,0,1,0,3.174.457A11.338,11.338,0,0,0,424.741,263.8Z"
                                  transform="translate(-412.298 -262.629)" fill="#fff"/>
                        </g>
                    </g>
                    <g id="Group_213" data-name="Group 213" transform="translate(22.299 72.009)">
                        <g id="Group_198" data-name="Group 198">
                            <path id="Path_87" data-name="Path 87"
                                  d="M299.213,279.207l-2.672,9.166-.942-.275,2.428-8.329-2.161-.628.244-.839Z"
                                  transform="translate(-295.6 -278.302)" fill="#fff"/>
                        </g>
                        <g id="Group_199" data-name="Group 199" transform="translate(3.941 2.335)">
                            <path id="Path_88" data-name="Path 88"
                                  d="M305.747,290.006l-.244.838-6.429-1.874.194-.667,4.9-2.62c1.332-.721,1.708-1.281,1.89-1.908.311-1.062-.245-1.933-1.646-2.343a3.239,3.239,0,0,0-2.8.293l-.5-.77a4.3,4.3,0,0,1,3.63-.363c1.859.541,2.762,1.829,2.316,3.361-.256.877-.76,1.582-2.341,2.428l-4.011,2.157Z"
                                  transform="translate(-299.074 -280.36)" fill="#fff"/>
                        </g>
                        <g id="Group_200" data-name="Group 200" transform="translate(12.772 5.563)">
                            <path id="Path_89" data-name="Path 89"
                                  d="M314.809,290.864l-1.834-.534-.7,2.409-.944-.276.7-2.409-5.172-1.507.2-.682,6.628-4.66,1.048.305-6.414,4.554,3.981,1.16.619-2.122.917.267-.618,2.122,1.834.535Z"
                                  transform="translate(-306.859 -283.206)" fill="#fff"/>
                        </g>
                        <g id="Group_201" data-name="Group 201" transform="translate(26.82 9.657)">
                            <path id="Path_90" data-name="Path 90"
                                  d="M327.191,294.472l-1.833-.534-.7,2.409-.944-.275.7-2.41-5.172-1.507.2-.682,6.631-4.66,1.047.305-6.413,4.553,3.979,1.161.619-2.122.915.267L325.6,293.1l1.833.534Z"
                                  transform="translate(-319.242 -286.815)" fill="#fff"/>
                        </g>
                        <g id="Group_202" data-name="Group 202" transform="translate(35.784 11.288)">
                            <path id="Path_91" data-name="Path 91"
                                  d="M334.224,296.327c-.454,1.559-1.9,2.461-4.137,1.807A4.939,4.939,0,0,1,327.144,296l.676-.614a4.147,4.147,0,0,0,2.506,1.882c1.56.453,2.606-.066,2.93-1.179.344-1.179-.175-2.126-2.507-2.805l-1.951-.568,1.812-4.461,5.015,1.462-.244.839-4.19-1.222-1.167,2.829,1.18.343C333.965,293.31,334.7,294.7,334.224,296.327Z"
                                  transform="translate(-327.144 -288.253)" fill="#fff"/>
                        </g>
                        <g id="Group_203" data-name="Group 203" transform="translate(45.241 14.455)">
                            <path id="Path_92" data-name="Path 92"
                                  d="M342.174,298.551a2.976,2.976,0,0,1-3.951,1.9c-2.437-.71-3.266-2.785-2.422-5.679.908-3.117,3.083-4.246,5.571-3.521a4.381,4.381,0,0,1,2.029,1.132l-.6.649a3.364,3.364,0,0,0-1.655-.952c-1.977-.576-3.619.323-4.343,2.812-.062.21-.125.474-.178.758a3.054,3.054,0,0,1,3.26-.754C341.706,295.432,342.663,296.876,342.174,298.551Zm-.937-.246c.351-1.2-.314-2.236-1.729-2.647a2.209,2.209,0,0,0-2.942,1.315c-.295,1.01.265,2.21,1.85,2.673A2.091,2.091,0,0,0,341.237,298.305Z"
                                  transform="translate(-335.481 -291.044)" fill="#fff"/>
                        </g>
                        <g id="Group_204" data-name="Group 204" transform="translate(57.373 17.368)">
                            <path id="Path_93" data-name="Path 93"
                                  d="M353.248,301.967c-.447,1.533-1.9,2.388-4.117,1.742a4.976,4.976,0,0,1-2.956-2.141l.676-.614a4.173,4.173,0,0,0,2.532,1.888c1.518.444,2.564-.019,2.9-1.158.32-1.1-.242-2.046-1.944-2.542l-.655-.191.2-.694,3.467-2.441-4.689-1.366.245-.838,5.893,1.715L354.6,296l-3.544,2.508C352.994,299.179,353.676,300.5,353.248,301.967Z"
                                  transform="translate(-346.175 -293.612)" fill="#fff"/>
                        </g>
                        <g id="Group_205" data-name="Group 205" transform="translate(66.972 20.788)">
                            <path id="Path_94" data-name="Path 94"
                                  d="M361.331,304.134a2.977,2.977,0,0,1-3.951,1.9c-2.436-.711-3.267-2.786-2.423-5.68.908-3.117,3.084-4.245,5.573-3.52a4.382,4.382,0,0,1,2.028,1.132l-.6.649a3.355,3.355,0,0,0-1.655-.952c-1.976-.576-3.618.323-4.343,2.812-.062.21-.125.474-.178.757a3.052,3.052,0,0,1,3.259-.753C360.863,301.014,361.82,302.459,361.331,304.134Zm-.938-.246c.351-1.2-.314-2.236-1.728-2.648a2.211,2.211,0,0,0-2.942,1.316c-.294,1.01.265,2.21,1.849,2.672A2.09,2.09,0,0,0,360.393,303.888Z"
                                  transform="translate(-354.637 -296.627)" fill="#fff"/>
                        </g>
                        <g id="Group_206" data-name="Group 206" transform="translate(76.442 22.361)">
                            <path id="Path_95" data-name="Path 95"
                                  d="M370.515,299.975l-.2.668-6.314,7.38-1.021-.3,6.2-7.23-4.716-1.373-.5,1.713-.931-.271.744-2.552Z"
                                  transform="translate(-362.985 -298.014)" fill="#fff"/>
                        </g>
                        <g id="Group_207" data-name="Group 207" transform="translate(89.547 26.18)">
                            <path id="Path_96" data-name="Path 96"
                                  d="M382.066,303.343l-.2.667-6.314,7.38-1.02-.3,6.2-7.227-4.715-1.375-.5,1.715-.93-.271.744-2.554Z"
                                  transform="translate(-374.537 -301.38)" fill="#fff"/>
                        </g>
                        <g id="Group_208" data-name="Group 208" transform="translate(96.959 29.438)">
                            <path id="Path_97" data-name="Path 97"
                                  d="M388.281,312.2c-.473,1.622-2.143,2.231-4.33,1.594s-3.241-2.04-2.768-3.663a2.384,2.384,0,0,1,2.424-1.738,2.152,2.152,0,0,1-.853-2.436c.434-1.493,1.976-2.053,3.914-1.488s2.963,1.873,2.53,3.366a2.162,2.162,0,0,1-2.054,1.588A2.408,2.408,0,0,1,388.281,312.2Zm-.965-.3c.328-1.125-.436-2.115-2.06-2.588s-2.786-.045-3.114,1.08.417,2.127,2.042,2.6S386.984,313.041,387.316,311.9Zm-1.842-3.335c1.428.415,2.467.024,2.758-.972.3-1.035-.421-1.926-1.8-2.328s-2.449-.031-2.746.99S384.045,308.15,385.474,308.566Z"
                                  transform="translate(-381.071 -304.252)" fill="#fff"/>
                        </g>
                        <g id="Group_209" data-name="Group 209" transform="translate(106.085 32.023)">
                            <path id="Path_98" data-name="Path 98"
                                  d="M396.717,312.378c-.909,3.116-3.085,4.245-5.572,3.52a4.383,4.383,0,0,1-2.028-1.132l.6-.649a3.338,3.338,0,0,0,1.655.952c1.977.576,3.619-.324,4.344-2.812.061-.21.124-.476.178-.758a3.054,3.054,0,0,1-3.261.754c-1.82-.531-2.777-1.975-2.288-3.652a2.975,2.975,0,0,1,3.95-1.9C396.729,307.408,397.559,309.483,396.717,312.378Zm-.766-2.2c.294-1.007-.265-2.209-1.852-2.67a2.086,2.086,0,0,0-2.817,1.336c-.353,1.206.313,2.238,1.728,2.651A2.211,2.211,0,0,0,395.951,310.179Z"
                                  transform="translate(-389.116 -306.531)" fill="#fff"/>
                        </g>
                        <g id="Group_210" data-name="Group 210" transform="translate(120.678 35.169)">
                            <path id="Path_99" data-name="Path 99"
                                  d="M405.593,310.207l-2.672,9.168-.942-.276,2.428-8.327-2.161-.631.244-.838Z"
                                  transform="translate(-401.98 -309.304)" fill="#fff"/>
                        </g>
                        <g id="Group_211" data-name="Group 211" transform="translate(124.618 37.503)">
                            <path id="Path_100" data-name="Path 100"
                                  d="M412.126,321.008l-.244.837-6.429-1.874.194-.666,4.9-2.623c1.332-.72,1.708-1.279,1.891-1.907.31-1.061-.246-1.934-1.647-2.343a3.234,3.234,0,0,0-2.8.294l-.5-.771a4.292,4.292,0,0,1,3.63-.363c1.859.541,2.762,1.828,2.315,3.36-.255.877-.759,1.582-2.34,2.43l-4.011,2.156Z"
                                  transform="translate(-405.453 -311.361)" fill="#fff"/>
                        </g>
                        <g id="Group_212" data-name="Group 212" transform="translate(132.964 39.396)">
                            <path id="Path_101" data-name="Path 101"
                                  d="M419.883,321.385c-.447,1.533-1.9,2.388-4.117,1.742a4.966,4.966,0,0,1-2.956-2.139l.676-.615a4.18,4.18,0,0,0,2.532,1.89c1.518.442,2.564-.019,2.9-1.159.32-1.1-.243-2.045-1.946-2.541l-.655-.192.2-.7,3.469-2.44-4.69-1.367.245-.838,5.892,1.717-.2.668-3.543,2.506C419.629,318.6,420.311,319.918,419.883,321.385Z"
                                  transform="translate(-412.81 -313.03)" fill="#fff"/>
                        </g>
                    </g>
                    <g id="Group_215" data-name="Group 215" transform="translate(88.023 108.709)">
                        <g id="Group_214" data-name="Group 214">
                            <rect id="Rectangle_36" data-name="Rectangle 36" width="4.146" height="76.473"
                                  transform="translate(0 3.98) rotate(-73.757)" fill="#fff"/>
                        </g>
                    </g>
                    <g id="Group_217" data-name="Group 217" transform="translate(121.471 127.077)">
                        <g id="Group_216" data-name="Group 216">
                            <rect id="Rectangle_37" data-name="Rectangle 37" width="4.146" height="39.222"
                                  transform="translate(0 3.981) rotate(-73.756)" fill="#fff"/>
                        </g>
                    </g>
                    <g id="Group_219" data-name="Group 219" transform="translate(22.608 40.415)">
                        <g id="Group_218" data-name="Group 218">
                            <path id="Rectangle_38" data-name="Rectangle 38"
                                  d="M4.964,0h22.16a4.963,4.963,0,0,1,4.963,4.963V19.007a4.964,4.964,0,0,1-4.964,4.964H4.964A4.964,4.964,0,0,1,0,19.007V4.964A4.964,4.964,0,0,1,4.964,0Z"
                                  transform="translate(6.707) rotate(16.248)" fill="#263238"/>
                        </g>
                    </g>
                    <g id="Group_221" data-name="Group 221" transform="translate(24.464 47.465)">
                        <g id="Group_220" data-name="Group 220">
                            <path id="Path_102" data-name="Path 102"
                                  d="M297.508,266.257l.432-1.476L313.8,269.4a3.458,3.458,0,1,0,1.935-6.64l-15.862-4.623.431-1.476,15.861,4.623a5,5,0,0,1-2.8,9.593Z"
                                  transform="translate(-297.508 -256.666)" fill="#fff"/>
                        </g>
                    </g>
                    <g id="Group_223" data-name="Group 223" transform="translate(45.568 57.323)">
                        <g id="Group_222" data-name="Group 222">
                            <rect id="Rectangle_39" data-name="Rectangle 39" width="1.538" height="11.34"
                                  transform="translate(0 1.476) rotate(-73.698)" fill="#fff"/>
                        </g>
                    </g>
                    <g id="Group_225" data-name="Group 225" transform="translate(36.49 22.538)">
                        <g id="Group_224" data-name="Group 224">
                            <rect id="Rectangle_40" data-name="Rectangle 40" width="82.523" height="7.082"
                                  transform="matrix(0.96, 0.28, -0.28, 0.96, 1.982, 0)" fill="#fff"/>
                        </g>
                    </g>
                </g>
                <g id="Group_228" data-name="Group 228" transform="translate(126.602)">
                    <g id="Group_227" data-name="Group 227">
                        <path id="Path_103" data-name="Path 103"
                              d="M391.079,173.877a5.576,5.576,0,0,1-3.4-3.787,4.9,4.9,0,0,1,1.5-4.8,4.374,4.374,0,0,1,4.938-.461,6.27,6.27,0,0,1,2.454,3.444,5,5,0,0,1,.3,2.821,4.149,4.149,0,0,1-3.054,2.753,12.222,12.222,0,0,1-4.288.116"
                              transform="translate(-387.545 -164.272)" fill="#263238"/>
                    </g>
                </g>
                <g id="Group_231" data-name="Group 231" transform="translate(131.094 8.842)">
                    <g id="Group_230" data-name="Group 230">
                        <g id="Group_229" data-name="Group 229">
                            <path id="Path_104" data-name="Path 104"
                                  d="M419.785,193.047a3.569,3.569,0,0,0,.068-1.484,3.36,3.36,0,0,0-.791-1.517,4.014,4.014,0,0,0-1.952-1.124,8.391,8.391,0,0,0-2.8-.2c-1.026.066-2.129.248-3.329.276a6.556,6.556,0,0,1-3.693-.875,5.914,5.914,0,0,1-2.206-3.411,18.126,18.126,0,0,0-3.631-6.516,19.3,19.3,0,0,0-4.7-3.923,26.943,26.943,0,0,0-5.244-2.2c0-.02.142-.009.4.031a9.4,9.4,0,0,1,1.125.229,16.366,16.366,0,0,1,3.931,1.564,18.777,18.777,0,0,1,4.906,3.926,18.186,18.186,0,0,1,3.787,6.691,5.382,5.382,0,0,0,1.955,3.106,6.067,6.067,0,0,0,3.36.816c1.146-.01,2.252-.174,3.309-.22a8.615,8.615,0,0,1,2.951.29,4.283,4.283,0,0,1,2.088,1.315,3.478,3.478,0,0,1,.767,1.7,2.459,2.459,0,0,1-.106,1.167C419.889,192.944,419.8,193.054,419.785,193.047Z"
                                  transform="translate(-391.504 -172.066)" fill="#263238"/>
                        </g>
                    </g>
                </g>
                <g id="Group_234" data-name="Group 234" transform="translate(134.383 35.842)">
                    <g id="Group_233" data-name="Group 233">
                        <g id="Group_232" data-name="Group 232">
                            <path id="Path_105" data-name="Path 105"
                                  d="M398.439,196.368c.037-.057.547.377.539,1.357a2.15,2.15,0,0,1-.686,1.52,2.3,2.3,0,0,1-3.629-.6,2.156,2.156,0,0,1-.163-1.661c.305-.93.927-1.178.944-1.112.069.069-.383.427-.526,1.213a1.828,1.828,0,0,0,.234,1.282,1.815,1.815,0,0,0,2.769.455,1.834,1.834,0,0,0,.631-1.14A5.3,5.3,0,0,0,398.439,196.368Z"
                                  transform="translate(-394.404 -195.867)" fill="#e0e0e0"/>
                        </g>
                    </g>
                </g>
                <g id="Group_237" data-name="Group 237" transform="translate(126.582 6.245)">
                    <g id="Group_236" data-name="Group 236">
                        <g id="Group_235" data-name="Group 235">
                            <path id="Path_106" data-name="Path 106"
                                  d="M396.425,174.565c-.142.124-1.6-1.716-4.1-3.015-2.48-1.334-4.821-1.5-4.8-1.691-.027-.149,2.459-.251,5.083,1.155C395.248,172.391,396.564,174.5,396.425,174.565Z"
                                  transform="translate(-387.527 -169.777)" fill="#e8505b"/>
                        </g>
                    </g>
                </g>
                <g id="Group_240" data-name="Group 240" transform="translate(138.501 34.903)">
                    <g id="Group_239" data-name="Group 239">
                        <g id="Group_238" data-name="Group 238">
                            <path id="Path_107" data-name="Path 107"
                                  d="M399.247,195.09c0-.078.321-.105.524.269a.807.807,0,0,1,.011.717.885.885,0,0,1-.77.473.923.923,0,0,1-.972-1.03c.052-.382.273-.518.331-.471.075.047.034.229.1.457a.517.517,0,0,0,.521.436.367.367,0,0,0,.377-.438C399.354,195.289,399.223,195.173,399.247,195.09Z"
                                  transform="translate(-398.034 -195.039)" fill="#e0e0e0"/>
                        </g>
                    </g>
                </g>
                <g id="Group_243" data-name="Group 243" transform="translate(112.35 57.545)">
                    <g id="Group_242" data-name="Group 242">
                        <g id="Group_241" data-name="Group 241">
                            <path id="Path_108" data-name="Path 108"
                                  d="M394.581,215a3.393,3.393,0,0,1,.127,1.224,9.525,9.525,0,0,1-.661,3.3,10.139,10.139,0,0,1-2.923,4.059,10.073,10.073,0,0,1-11.639.7,10.124,10.124,0,0,1-3.39-3.679,9.5,9.5,0,0,1-1.054-3.2,3.421,3.421,0,0,1-.022-1.231,13.389,13.389,0,0,0,1.45,4.217,10.068,10.068,0,0,0,3.314,3.416,9.73,9.73,0,0,0,10.987-.662,10.08,10.08,0,0,0,2.879-3.789A13.369,13.369,0,0,0,394.581,215Z"
                                  transform="translate(-374.982 -214.999)" fill="#455a64"/>
                        </g>
                    </g>
                </g>
                <g id="Group_246" data-name="Group 246" transform="translate(119.898 197.335)">
                    <g id="Group_245" data-name="Group 245">
                        <g id="Group_244" data-name="Group 244">
                            <path id="Path_109" data-name="Path 109"
                                  d="M391.308,458.408a1.188,1.188,0,0,1-.066-.305c-.036-.239-.079-.537-.135-.905-.11-.843-.263-2.007-.456-3.484-.388-3.027-.905-7.412-1.505-12.836-1.206-10.846-2.692-25.851-4.028-42.448s-2.261-31.655-2.8-42.554c-.272-5.45-.463-9.861-.564-12.911-.044-1.488-.079-2.662-.1-3.512-.006-.372-.009-.673-.012-.914a1.164,1.164,0,0,1,.017-.312,1.2,1.2,0,0,1,.045.31c.019.241.043.54.073.911.052.849.126,2.02.219,3.506.182,3.095.439,7.488.757,12.9.65,10.891,1.647,25.931,2.978,42.529s2.753,31.6,3.85,42.452c.55,5.391,1,9.771,1.313,12.854.145,1.483.26,2.651.344,3.5.029.371.054.67.074.911A1.193,1.193,0,0,1,391.308,458.408Z"
                                  transform="translate(-381.635 -338.226)" fill="#263238"/>
                        </g>
                    </g>
                </g>
                <g id="Group_249" data-name="Group 249" transform="translate(115.643 317.392)">
                    <g id="Group_248" data-name="Group 248">
                        <g id="Group_247" data-name="Group 247">
                            <path id="Path_110" data-name="Path 110"
                                  d="M410.325,444.264a5.229,5.229,0,0,1-1.268.177c-.819.076-2.006.153-3.474.222-2.936.144-7,.211-11.481.142s-8.536-.206-11.471-.319l-3.474-.163a5.213,5.213,0,0,1-1.273-.141,5.2,5.2,0,0,1,1.277-.1c.821-.023,2.009-.032,3.478-.03,2.937,0,6.994.075,11.471.14s8.526.07,11.46.037l3.476-.031A5.191,5.191,0,0,1,410.325,444.264Z"
                                  transform="translate(-377.884 -444.058)" fill="#263238"/>
                        </g>
                    </g>
                </g>
                <g id="Group_253" data-name="Group 253" transform="translate(55.473 83.218)">
                    <g id="Group_252" data-name="Group 252">
                        <g id="Group_251" data-name="Group 251">
                            <g id="Group_250" data-name="Group 250">
                                <path id="Path_111" data-name="Path 111"
                                      d="M423.911,250.427l-19.457-12.8s-9.514,27.41-12.431,27.675c-16.156,1.474-33.441-3.883-39.5-6-.616-.691-1.318-1.521-2.1-2.537a9.64,9.64,0,0,1-1.52-2.9,14.758,14.758,0,0,1-.866-3.991,1.267,1.267,0,0,0-2.178-1c-.7.9-.877,4.366.717,8.091s-4.049.761-6.126-.281-8.651-3.967-9.478-3.584c-1.212.565-.83,1.966,1.268,2.959,2.122,1.006,8.178,4.415,7.574,5.485-.594,1.054-11.092-4.4-11.092-4.4s-2.054-1.528-2.793-.317c-1.333,2.188,10.254,7.164,11.368,7.61.774.31.16,1.5-.653,1.119-.838-.388-10.345-5.682-11.723-3.467-1.056,1.7,9.493,4.18,10.855,6.373s-7.809-2.694-8.752-1.029c-.351.621-.527,1.131,5.145,3.177a120.663,120.663,0,0,0,12.642,3.227l-.02.058s57.923,25.93,68.878.913C425.332,248.172,423.911,250.427,423.911,250.427Z"
                                      transform="translate(-324.844 -237.63)" fill="#e5a7b7"/>
                            </g>
                        </g>
                    </g>
                </g>
                <g id="Group_258" data-name="Group 258" transform="translate(123.595 58.546)">
                    <g id="Group_257" data-name="Group 257">
                        <g id="Group_256" data-name="Group 256">
                            <g id="Group_255" data-name="Group 255">
                                <g id="Group_254" data-name="Group 254">
                                    <path id="Path_112" data-name="Path 112"
                                          d="M403.05,215.881s17.7,2.088,15.831,23.137A102.818,102.818,0,0,1,408.1,276.355l-23.2-12.185a143.79,143.79,0,0,0,11.7-32.831l6.454-15.459Z"
                                          transform="translate(-384.894 -215.881)" fill="#e8505b"/>
                                </g>
                            </g>
                        </g>
                    </g>
                </g>
                <g id="Group_263" data-name="Group 263" transform="translate(123.595 58.546)" opacity="0.2">
                    <g id="Group_262" data-name="Group 262">
                        <g id="Group_261" data-name="Group 261">
                            <g id="Group_260" data-name="Group 260">
                                <g id="Group_259" data-name="Group 259">
                                    <path id="Path_113" data-name="Path 113"
                                          d="M403.05,215.881s17.7,2.088,15.831,23.137A102.818,102.818,0,0,1,408.1,276.355l-23.2-12.185a143.79,143.79,0,0,0,11.7-32.831l6.454-15.459Z"
                                          transform="translate(-384.894 -215.881)" fill="#7467f0"/>
                                </g>
                            </g>
                        </g>
                    </g>
                </g>
                <g id="Group_266" data-name="Group 266" transform="translate(134.416 58.587)">
                    <g id="Group_265" data-name="Group 265">
                        <g id="Group_264" data-name="Group 264">
                            <path id="Path_114" data-name="Path 114"
                                  d="M402.158,215.937c.04.142-1.926.666-4.879.871l.216-.412,2.183,3.547,1.383,2.315.332.557-.632-.121a49.128,49.128,0,0,0-6.328-.53,5.148,5.148,0,0,1,1.8-.294,19.909,19.909,0,0,1,4.631.253l-.3.436c-.445-.726-.917-1.5-1.406-2.3l-2.124-3.58-.233-.393.448-.019c1.459-.06,2.687-.153,3.544-.233A6.522,6.522,0,0,1,402.158,215.937Z"
                                  transform="translate(-394.433 -215.917)" fill="#455a64"/>
                        </g>
                    </g>
                </g>
                <g id="Group_269" data-name="Group 269" transform="translate(132.347 66.856)">
                    <g id="Group_268" data-name="Group 268">
                        <g id="Group_267" data-name="Group 267">
                            <path id="Path_115" data-name="Path 115"
                                  d="M412.815,223.952c-.016.1-1.647-.3-4.468-.37l.186-.218c.67,2.664,1.561,6.2,2.589,10.285l.12.478-.469-.129-7.214-1.981-1.967-.546.388-.3c.16,3.913.309,7.538.436,10.658l.014.344-.318-.09-6.926-1.94-1.916-.577a2.461,2.461,0,0,1-.661-.253,2.583,2.583,0,0,1,.7.108l1.948.444,6.958,1.728-.3.255c-.157-3.117-.34-6.741-.538-10.651l-.022-.416.411.113,1.963.542,7.186,2.009-.348.348c-.948-4.109-1.771-7.672-2.389-10.353l-.053-.231.239.014a22.043,22.043,0,0,1,3.3.421A4.848,4.848,0,0,1,412.815,223.952Z"
                                  transform="translate(-392.609 -223.206)" fill="#455a64"/>
                        </g>
                    </g>
                </g>
                <g id="Group_272" data-name="Group 272" transform="translate(129.488 92.295)">
                    <g id="Group_271" data-name="Group 271">
                        <g id="Group_270" data-name="Group 270">
                            <path id="Path_116" data-name="Path 116"
                                  d="M414.588,249.7a2.956,2.956,0,0,1-.825-.844c-.479-.606-.991-1.605-1.749-2.761l.313-.011a68.781,68.781,0,0,1-6.421,10.2l-.234.306-.234-.305-3.453-4.5-2.606-3.417.434.043-4.18,3.647-1.877,1.628-.877.757-.421.363-.1.089-.053.047-.053.04a.216.216,0,0,1-.073.034c-.037.094-.374-.142-.29-.248.011-.07,0-.026.009-.045l.009-.024.015-.033c.008-.011,0-.014,0,.028-.019.053.079.189.118.179.061.011.007,0-.014.01l-.193.062-.066-.217c-.68-2.235-1.162-4.065-1.427-5.351a5.538,5.538,0,0,1-.218-2.029c.042,0,.11.714.465,1.97.338,1.257.885,3.065,1.613,5.269l-.259-.153a.482.482,0,0,1,.251,0,.288.288,0,0,1,.189.279.418.418,0,0,1-.045.155c-.024-.014.044.05-.057-.026a1.542,1.542,0,0,0-.159-.062.306.306,0,0,0-.066-.113c-.02-.027-.022-.008-.065-.07h0l0,0,.009-.007.049-.044.1-.091.413-.372.86-.774,1.851-1.657,4.146-3.688.239-.212.2.255,2.615,3.41,3.436,4.509h-.467a80.92,80.92,0,0,0,6.569-10.021l.154-.276.159.264c.732,1.212,1.184,2.221,1.6,2.846S414.617,249.668,414.588,249.7Z"
                                  transform="translate(-390.089 -245.631)" fill="#455a64"/>
                        </g>
                    </g>
                </g>
                <g id="Group_275" data-name="Group 275" transform="translate(123.569 80.185)">
                    <g id="Group_274" data-name="Group 274">
                        <g id="Group_273" data-name="Group 273">
                            <path id="Path_117" data-name="Path 117"
                                  d="M395.241,234.956a4.017,4.017,0,0,1-.2,1.1c-.162.7-.431,1.7-.79,2.937-.715,2.467-1.825,5.841-3.259,9.49s-2.926,6.876-4.084,9.167c-.579,1.147-1.066,2.065-1.425,2.687a3.982,3.982,0,0,1-.608.94,33.952,33.952,0,0,1,1.645-3.813c1.055-2.332,2.474-5.571,3.906-9.2s2.6-6.971,3.416-9.4A33.63,33.63,0,0,1,395.241,234.956Z"
                                  transform="translate(-384.871 -234.956)" fill="#455a64"/>
                        </g>
                    </g>
                </g>
                <g id="Group_288" data-name="Group 288" transform="translate(123.569 58.587)">
                    <g id="Group_278" data-name="Group 278" transform="translate(10.847)">
                        <g id="Group_277" data-name="Group 277">
                            <g id="Group_276" data-name="Group 276">
                                <path id="Path_118" data-name="Path 118"
                                      d="M402.158,215.937c.04.142-1.926.666-4.879.871l.216-.412,2.183,3.547,1.383,2.315.332.557-.632-.121a49.128,49.128,0,0,0-6.328-.53,5.148,5.148,0,0,1,1.8-.294,19.909,19.909,0,0,1,4.631.253l-.3.436c-.445-.726-.917-1.5-1.406-2.3l-2.124-3.58-.233-.393.448-.019c1.459-.06,2.687-.153,3.544-.233A6.522,6.522,0,0,1,402.158,215.937Z"
                                      transform="translate(-394.433 -215.917)" fill="#455a64"/>
                            </g>
                        </g>
                    </g>
                    <g id="Group_281" data-name="Group 281" transform="translate(8.777 8.269)">
                        <g id="Group_280" data-name="Group 280">
                            <g id="Group_279" data-name="Group 279">
                                <path id="Path_119" data-name="Path 119"
                                      d="M412.815,223.952c-.016.1-1.647-.3-4.468-.37l.186-.218c.67,2.664,1.561,6.2,2.589,10.285l.12.478-.469-.129-7.214-1.981-1.967-.546.388-.3c.16,3.913.309,7.538.436,10.658l.014.344-.318-.09-6.926-1.94-1.916-.577a2.461,2.461,0,0,1-.661-.253,2.583,2.583,0,0,1,.7.108l1.948.444,6.958,1.728-.3.255c-.157-3.117-.34-6.741-.538-10.651l-.022-.416.411.113,1.963.542,7.186,2.009-.348.348c-.948-4.109-1.771-7.672-2.389-10.353l-.053-.231.239.014a22.043,22.043,0,0,1,3.3.421A4.848,4.848,0,0,1,412.815,223.952Z"
                                      transform="translate(-392.609 -223.206)" fill="#455a64"/>
                            </g>
                        </g>
                    </g>
                    <g id="Group_284" data-name="Group 284" transform="translate(5.918 33.708)">
                        <g id="Group_283" data-name="Group 283">
                            <g id="Group_282" data-name="Group 282">
                                <path id="Path_120" data-name="Path 120"
                                      d="M414.588,249.7a2.956,2.956,0,0,1-.825-.844c-.479-.606-.991-1.605-1.749-2.761l.313-.011a68.781,68.781,0,0,1-6.421,10.2l-.234.306-.234-.305-3.453-4.5-2.606-3.417.434.043-4.18,3.647-1.877,1.628-.877.757-.421.363-.1.089-.053.047-.053.04a.216.216,0,0,1-.073.034c-.037.094-.374-.142-.29-.248.011-.07,0-.026.009-.045l.009-.024.015-.033c.008-.011,0-.014,0,.028-.019.053.079.189.118.179.061.011.007,0-.014.01l-.193.062-.066-.217c-.68-2.235-1.162-4.065-1.427-5.351a5.538,5.538,0,0,1-.218-2.029c.042,0,.11.714.465,1.97.338,1.257.885,3.065,1.613,5.269l-.259-.153a.482.482,0,0,1,.251,0,.288.288,0,0,1,.189.279.418.418,0,0,1-.045.155c-.024-.014.044.05-.057-.026a1.542,1.542,0,0,0-.159-.062.306.306,0,0,0-.066-.113c-.02-.027-.022-.008-.065-.07h0l0,0,.009-.007.049-.044.1-.091.413-.372.86-.774,1.851-1.657,4.146-3.688.239-.212.2.255,2.615,3.41,3.436,4.509h-.467a80.92,80.92,0,0,0,6.569-10.021l.154-.276.159.264c.732,1.212,1.184,2.221,1.6,2.846S414.617,249.668,414.588,249.7Z"
                                      transform="translate(-390.089 -245.631)" fill="#455a64"/>
                            </g>
                        </g>
                    </g>
                    <g id="Group_287" data-name="Group 287" transform="translate(0 21.598)">
                        <g id="Group_286" data-name="Group 286">
                            <g id="Group_285" data-name="Group 285">
                                <path id="Path_121" data-name="Path 121"
                                      d="M395.241,234.956a4.017,4.017,0,0,1-.2,1.1c-.162.7-.431,1.7-.79,2.937-.715,2.467-1.825,5.841-3.259,9.49s-2.926,6.876-4.084,9.167c-.579,1.147-1.066,2.065-1.425,2.687a3.982,3.982,0,0,1-.608.94,33.952,33.952,0,0,1,1.645-3.813c1.055-2.332,2.474-5.571,3.906-9.2s2.6-6.971,3.416-9.4A33.63,33.63,0,0,1,395.241,234.956Z"
                                      transform="translate(-384.871 -234.956)" fill="#455a64"/>
                            </g>
                        </g>
                    </g>
                </g>
            </svg>
        </div>
    </div>
    <div class="w-100">
        <div class="table-box table-responsive">
            <table id="invoicesTable" class="table" data-source-url="{{ route('frontend.wallet.index') }}">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Service</th>
                    <th>Provider</th>
                    <th>Amount</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Method</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ url('js/user_panel/wallet.js') }}" defer></script>
@endsection
