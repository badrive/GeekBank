<div x-data="{ open: false }"
    class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700 fixed h-full ">
    <!-- Primary Navigation Menu -->

    <div style="height: 90%; "
        class="flex flex-col justify-between items-center h-full  max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Logo -->
        <a href="{{ route('dashboard') }}" class="text-white relative shrink-0 flex items-center mt-4">
            <svg class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" viewBox="0 0 37 36" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M29.8744 0H7.05262L0 21.706L18.463 35.121L36.93 21.706L29.8744 0ZM18.464 27.506L7.24261 19.353L11.5284 6.161H25.3986L29.6844 19.353L18.464 27.506Z"
                    fill="white" />
                <path d="M13.1763 19.326L18.464 23.167L23.7517 19.326H13.1763Z" fill="white" />
            </svg>
            <h1 style="font-weight: 900; padding: 10px;">GeekBank</h1>
        </a>

        <!-- Navigation Links -->
        <div class="">
            <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                <div style="display: flex; gap: 5px;" class=" flex flex-col items-center">
                    <svg width="30px" height="30px" viewBox="0 -0.5 21 21" version="1.1"
                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#ffffff">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <title>home [#ffffff]</title>
                            <desc>Created with Sketch.</desc>
                            <defs> </defs>
                            <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g id="Dribbble-Light-Preview" transform="translate(-419.000000, -720.000000)"
                                    fill="#ffffff">
                                    <g id="icons" transform="translate(56.000000, 160.000000)">
                                        <path
                                            d="M379.79996,578 L376.649968,578 L376.649968,574 L370.349983,574 L370.349983,578 L367.19999,578 L367.19999,568.813 L373.489475,562.823 L379.79996,568.832 L379.79996,578 Z M381.899955,568.004 L381.899955,568 L381.899955,568 L373.502075,560 L363,569.992 L364.481546,571.406 L365.099995,570.813 L365.099995,580 L372.449978,580 L372.449978,576 L374.549973,576 L374.549973,580 L381.899955,580 L381.899955,579.997 L381.899955,570.832 L382.514204,571.416 L384.001,570.002 L381.899955,568.004 Z"
                                            id="home-[#ffffff]"> </path>
                                    </g>
                                </g>
                            </g>
                        </g>
                    </svg>
                    {{ __('Dashboard') }}
                </div>
            </x-nav-link>
        </div>

        <div class="">
            <x-nav-link :href="route('cards')" :active="request()->routeIs('cards')">
                <div style="display: flex; gap: 5px;" class="flex flex-col items-center">
                    <svg width="30px" height="30px" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <path
                                d="M2 12C2 8.22876 2 6.34315 3.17157 5.17157C4.34315 4 6.22876 4 10 4H14C17.7712 4 19.6569 4 20.8284 5.17157C22 6.34315 22 8.22876 22 12C22 15.7712 22 17.6569 20.8284 18.8284C19.6569 20 17.7712 20 14 20H10C6.22876 20 4.34315 20 3.17157 18.8284C2 17.6569 2 15.7712 2 12Z"
                                stroke="#ffffff" stroke-width="1.5"></path>
                            <path opacity="0.5" d="M10 16H6" stroke="#ffffff" stroke-width="1.5"
                                stroke-linecap="round"></path>
                            <path opacity="0.5" d="M14 16H12.5" stroke="#ffffff" stroke-width="1.5"
                                stroke-linecap="round"></path>
                            <path opacity="0.5" d="M2 10L22 10" stroke="#ffffff" stroke-width="1.5"
                                stroke-linecap="round"></path>
                        </g>
                    </svg>
                    {{ __('Cards') }}
                </div>
            </x-nav-link>
        </div>

        <div class="">
            <x-nav-link :href="route('transition')" :active="request()->routeIs('transition')">
                <div style="display: flex; gap: 5px;" class="flex flex-col items-center">
                    <svg width="30px" height="30px" viewBox="0 0 24 24" version="1.1"
                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#ffffff">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <title>Transfer</title>
                            <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g id="Transfer">
                                    <rect id="Rectangle" fill-rule="nonzero" x="0" y="0" width="24" height="24">
                                    </rect>
                                    <path d="M19,7 L5,7 M20,17 L5,17" id="Shape" stroke="#ffffff" stroke-width="2"
                                        stroke-linecap="round"> </path>
                                    <path
                                        d="M16,3 L19.2929,6.29289 C19.6834,6.68342 19.6834,7.31658 19.2929,7.70711 L16,11"
                                        id="Path" stroke="#ffffff" stroke-width="2" stroke-linecap="round">
                                    </path>
                                    <path
                                        d="M8,13 L4.70711,16.2929 C4.31658,16.6834 4.31658,17.3166 4.70711,17.7071 L8,21"
                                        id="Path" stroke="#ffffff" stroke-width="2" stroke-linecap="round">
                                    </path>
                                </g>
                            </g>
                        </g>
                    </svg>
                    {{ __('Transition') }}
                </div>
            </x-nav-link>
        </div>

        <div class="">
            <x-nav-link :href="route('bills')" :active="request()->routeIs('bills')">
                <div style="display: flex; gap: 5px;" class="flex flex-col items-center">
                    <svg width="30px" height="30px" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M7.09878 1.25004C7.14683 1.25006 7.19559 1.25008 7.24508 1.25008H16.7551C16.8045 1.25008 16.8533 1.25006 16.9014 1.25004C17.9181 1.2496 18.6178 1.24929 19.2072 1.45435C20.3201 1.84161 21.1842 2.73726 21.5547 3.86559L20.8421 4.09954L21.5547 3.86559C21.7507 4.46271 21.7505 5.17254 21.7501 6.22655C21.7501 6.27372 21.7501 6.32158 21.7501 6.37014V20.3743C21.7501 21.8395 20.0231 22.7118 18.8857 21.671C18.8062 21.5983 18.694 21.5983 18.6145 21.671L18.1314 22.1131C17.2032 22.9624 15.7969 22.9624 14.8688 22.1131C14.5138 21.7882 13.9864 21.7882 13.6314 22.1131C12.7032 22.9624 11.2969 22.9624 10.3688 22.1131C10.0138 21.7882 9.48637 21.7882 9.13138 22.1131C8.20319 22.9624 6.79694 22.9624 5.86875 22.1131L5.38566 21.671C5.30618 21.5983 5.19395 21.5983 5.11448 21.671C3.97705 22.7118 2.25007 21.8395 2.25007 20.3743V6.37014C2.25007 6.32158 2.25005 6.27372 2.25003 6.22655C2.24965 5.17255 2.24939 4.46271 2.44545 3.86559C2.81591 2.73726 3.68002 1.84161 4.79298 1.45435C5.3823 1.24929 6.08203 1.2496 7.09878 1.25004ZM7.24508 2.75008C6.024 2.75008 5.6034 2.76057 5.28593 2.87103C4.62655 3.10047 4.09919 3.63728 3.8706 4.3335C3.75951 4.67183 3.75007 5.11796 3.75007 6.37014V20.3743C3.75007 20.4933 3.80999 20.5661 3.88517 20.6009C3.92434 20.619 3.96264 20.6237 3.99456 20.6194C4.0227 20.6156 4.05911 20.6035 4.10185 20.5644C4.75453 19.9671 5.74561 19.9671 6.39828 20.5644L6.88138 21.0065C7.23637 21.3313 7.76377 21.3313 8.11875 21.0065C9.04694 20.1571 10.4532 20.1571 11.3814 21.0065C11.7364 21.3313 12.2638 21.3313 12.6188 21.0065C13.5469 20.1571 14.9532 20.1571 15.8814 21.0065C16.2364 21.3313 16.7638 21.3313 17.1188 21.0065L17.6019 20.5644C18.2545 19.9671 19.2456 19.9671 19.8983 20.5644C19.941 20.6035 19.9774 20.6156 20.0056 20.6194C20.0375 20.6237 20.0758 20.619 20.115 20.6009C20.1901 20.5661 20.2501 20.4934 20.2501 20.3743V6.37014C20.2501 5.11797 20.2406 4.67183 20.1295 4.3335C19.9009 3.63728 19.3736 3.10047 18.7142 2.87103C18.3967 2.76057 17.9761 2.75008 16.7551 2.75008H7.24508ZM6.25007 7.50008C6.25007 7.08587 6.58585 6.75008 7.00007 6.75008H7.50007C7.91428 6.75008 8.25007 7.08587 8.25007 7.50008C8.25007 7.9143 7.91428 8.25008 7.50007 8.25008H7.00007C6.58585 8.25008 6.25007 7.9143 6.25007 7.50008ZM9.75007 7.50008C9.75007 7.08587 10.0859 6.75008 10.5001 6.75008H17.0001C17.4143 6.75008 17.7501 7.08587 17.7501 7.50008C17.7501 7.9143 17.4143 8.25008 17.0001 8.25008H10.5001C10.0859 8.25008 9.75007 7.9143 9.75007 7.50008ZM6.25007 11.0001C6.25007 10.5859 6.58585 10.2501 7.00007 10.2501H7.50007C7.91428 10.2501 8.25007 10.5859 8.25007 11.0001C8.25007 11.4143 7.91428 11.7501 7.50007 11.7501H7.00007C6.58585 11.7501 6.25007 11.4143 6.25007 11.0001ZM9.75007 11.0001C9.75007 10.5859 10.0859 10.2501 10.5001 10.2501H17.0001C17.4143 10.2501 17.7501 10.5859 17.7501 11.0001C17.7501 11.4143 17.4143 11.7501 17.0001 11.7501H10.5001C10.0859 11.7501 9.75007 11.4143 9.75007 11.0001ZM6.25007 14.5001C6.25007 14.0859 6.58585 13.7501 7.00007 13.7501H7.50007C7.91428 13.7501 8.25007 14.0859 8.25007 14.5001C8.25007 14.9143 7.91428 15.2501 7.50007 15.2501H7.00007C6.58585 15.2501 6.25007 14.9143 6.25007 14.5001ZM9.75007 14.5001C9.75007 14.0859 10.0859 13.7501 10.5001 13.7501H17.0001C17.4143 13.7501 17.7501 14.0859 17.7501 14.5001C17.7501 14.9143 17.4143 15.2501 17.0001 15.2501H10.5001C10.0859 15.2501 9.75007 14.9143 9.75007 14.5001Z"
                                fill="#ffffff"></path>
                        </g>
                    </svg>
                    {{ __('Bills') }}
                </div>
            </x-nav-link>
        </div>

        <div class="">
            <x-nav-link :href="route('crypto')" :active="request()->routeIs('crypto')">
                <div style="display: flex; gap: 5px;" class="flex flex-col items-center">
                    <svg width="30px" height="30px" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <path
                                d="M10 6V4M14 6V4M14 6H7M14 6C15.6569 6 17 7.34315 17 9C17 10.6569 15.6569 12 14 12M9 18L9 12M9 6V12M10 20V18M14 20V18M9 12H15C16.6569 12 18 13.3431 18 15C18 16.6569 16.6569 18 15 18H7"
                                stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            </path>
                        </g>
                    </svg>
                    {{ __('Crypto') }}
                </div>
            </x-nav-link>
        </div>

        <div class="">
            <x-nav-link :href="route('invest')" :active="request()->routeIs('invest')">
                <div style="display: flex; gap: 5px;" class="flex flex-col items-center">
                    <svg fill="#000000" width="40px" height="40px" viewBox="0 0 24 24" id="up-trend-round"
                        data-name="Flat Line" xmlns="http://www.w3.org/2000/svg" class="icon flat-line">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <path id="primary" d="M21,7l-6.79,6.79a1,1,0,0,1-1.42,0l-2.58-2.58a1,1,0,0,0-1.42,0L3,17"
                                style="fill: none; stroke: #ffffff; stroke-linecap: round; stroke-linejoin: round; stroke-width: 2;">
                            </path>
                            <polyline id="primary-2" data-name="primary" points="21 11 21 7 17 7"
                                style="fill: none; stroke: #ffffff; stroke-linecap: round; stroke-linejoin: round; stroke-width: 2;">
                            </polyline>
                        </g>
                    </svg>
                    {{ __('Invest') }}
                </div>
            </x-nav-link>
        </div>


    </div>



</div>
