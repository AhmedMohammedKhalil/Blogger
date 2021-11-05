<style>

    @media (max-width: 992px) {
        .full-page-sidebar .sidebar-container {
            padding: 0;
        }
    }
    .full-page-sidebar .sidebar-container {
        padding: 20px 40px 0
    }
    .search-followers {
        position: relative;
        cursor: pointer;
    }
    .icon-material-outline-search {
        font-size: 36px;
        position: absolute;
        top: 50%;
        transform: translate(-50%,-50%);
    }
    #header .container {
        display:flex;
    }

    #header .left {
            display: flex;
            width: 60%;
            align-items: center;
        }
    #header .right {
        display: flex;
        width: 40%;
        justify-content: flex-end;
        align-items: center
    }
    @media (max-width: 426px) {
        #header {
            height: 130px !important;
        }    
        
        #header .container {
            display: flex;
            flex-direction: column;
            flex-wrap: wrap;
        }

        #header .left {
            display: flex;
            width: 100%;
            align-items: center;
            height: 60px;
            border-bottom: 2px solid;
        }
        #header .right {
            display: flex;
            width: 100%;
            padding-top: 15px;
            justify-content: space-evenly;
        }
        .dashboard-sidebar {
            margin-top: 140px !important;
        }
    }
    
    
    .header-widget {
        border-left: none
    }

    
    #header .left #logo {
        width: 320px !important;
    }

    @media (max-width: 768px) {
        #header .left #logo {
            width: 123px !important;
        }
    }

    @media (max-width: 426px) {
        #header .left #logo {
            width: 75% !important;
        }
    }


    #logo a {
        height: 100%;
        width: 100%;
        display: inline-block;
    }

    
    .user-avatar {
        border:5px solid #ccc;
    }
    .user-avatar::after {
        display: none
    }
    .user-name {
        font-weight: 500;
        color: #333;
        line-height: 20px;
        padding: 11px 0 0 15px; 
    }

    @media (max-width: 768px)
    {
        .user-menu .header-notifications-dropdown, .header-notifications-dropdown {
            width: calc(100vw - 45px);
            right: 22px;
            top: calc(100% + 15px);
        }
    }


    @media (min-width: 767px)
    {
        .sidebar {
            margin-top: 100px
        }
    }

    
    @media (max-width:992px) {
        .full-page-content-inner {
            margin-top:0;
        }
    }
    .full-page-container {
        padding-top : 76px;
    }
    @media (max-width:426px) {
        .full-page-container {
            padding-top: 115px;
        }
    }
    .sidebar-search-button-container {
        position : relative
    }

    .bookmark-icon:hover {
        background-color: green;
        color: #fff;
    }

    .bookmark-icon:before {
        top: 2px;
        content: "\002B";
        font-size: 36px;
        font-weight: bold;
    }

    .full-page-sidebar .full-page-sidebar-inner {
        overflow: hidden;
        height: 100%;
    }
    .full-page-content-inner {
        position: relative;
    }
    .full-page-content-inner .small-footer {
        width: 100%;
        left: 0px;
        padding: 25px 50px;
        position: absolute;
        bottom: 0;
    }
    @media (max-width: 768px) {
        .full-page-sidebar-inner, .full-page-content-container,
         .full-page-container .full-page-sidebar { 
            height: auto !important
         }

    }
    div.p-c {
        margin-bottom: 60px;
        box-shadow: -2px 5px 23px #ccc;
    }
    .flex {
        display:flex;
        flex-direction: row;
        justify-content: space-between;
        align-items: center
    }
    .posts-content{
        margin-top:20px;    
    }
    .ui-w-40 {
        width: 100px !important;
        height: auto;
    }
    .default-style .ui-bordered {
        border: 1px solid rgba(24,28,33,0.06);
    }
    .ui-bg-cover {
        background-color: transparent;
        background-position: center center;
        background-size: cover;
    }
    .ui-rect, .ui-rect-30, .ui-rect-60, .ui-rect-67, .ui-rect-75 {
        position: relative !important;
        display: block !important;
        width: 100% !important;
    }
    .d-flex, .d-inline-flex, .media, .media>:not(.media-body), .jumbotron, .card {
        -ms-flex-negative: 1;
        flex-shrink: 1;
    }
    .bg-dark {
        background-color: rgba(24,28,33,0.9) !important;
    }
    .card-footer, .card hr {
        border-color: rgba(24,28,33,0.06);
    }
    .ui-rect-content {
        position: absolute !important;
        top: 0 !important;
        right: 0 !important;
        bottom: 0 !important;
        left: 0 !important;
    }
    .default-style .ui-bordered {
        border: 1px solid rgba(24,28,33,0.06);
    }
    .content-item {
        padding:15px 0;
        background-color:#FFFFFF;
    }

    .content-item.grey {
        background-color:#F0F0F0;
        padding:50px 0;
        height:100%;
    }

    .content-item h2 {
        font-weight:700;
        font-size:35px;
        line-height:45px;
        text-transform:uppercase;
        margin:20px 0;
    }

    .content-item h3 {
        font-weight:400;
        font-size:20px;
        color:#555555;
        margin:10px 0 15px;
        padding:0;
    }

    .content-headline {
        height:1px;
        text-align:center;
        margin:20px 0 70px;
    }

    .content-headline h2 {
        background-color:#FFFFFF;
        display:inline-block;
        margin:-20px auto 0;
        padding:0 20px;
    }

    .grey .content-headline h2 {
        background-color:#F0F0F0;
    }

    .content-headline h3 {
        font-size:14px;
        color:#AAAAAA;
        display:block;
    }


    #comments {
        border: 2px solid rgb(0 0 0 /10%);
        background-color:#FFFFFF;
    }
    #comments .btn {
        margin-top:7px;
    }
    #comments a {
        color : black
    }
    #comments form fieldset {
        clear:both;
    }

    #comments .media {
        border-top:1px dashed #DDDDDD;
        padding:20px 0;
        margin:0;
    }

    #comments .media > .pull-left {
        margin-right:20px;
    }

    #comments .media img {
        max-width:100px;
    }
    #comments img {
        border-radius: 50%;

    }
    #comments .menu ,.media .menu{
        margin-bottom: 0;
        width: 67px;
        justify-content: flex-end;
    }
    #comments .media-heading , #comments .menu li, .media .menu li{
        font-size: 30px
    }

    #comments .media-detail li a {
        font-size: 18px;
        text-decoration: none;
        padding: 0 20px;
        text-align: center;
    }

    #comments .media h4 span {
        font-size:14px;
        color:#999999;
    }

    #comments .media p {
        margin-bottom:15px;
        text-align:justify;
    }

    #comments .media-detail {
        margin:0;
    }

    #comments .media-detail li {
        color:#AAAAAA;
        font-size:12px;
        padding-right: 10px;
        font-weight:600;
    }

    #comments .media-detail a:hover {
        background-color: rgb(0 0 0 /20%)
    }

    #comments .media-detail li:last-child {
        padding-right:0;
    }

    #comments .media-detail li i {
        color:#666666;
        font-size:15px;
        margin-right:10px;
    }
    .image-user {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 130px;
        padding-right: 0;
    }
    .posts-content {
        padding: 0
    }
    .images {
        justify-content: space-evenly;
        flex-wrap: wrap;

    }
    .images img {
        width: 315px;
        height: 315px;
        margin: 10px 0;
    }
    .more-images {
        width: 100%;
        height: 315px;
        right: 0;
        top: 0;
        background-color: black;
        margin-top: 10px;
    }
    
    .card-footer .media-detail li a {
        font-size: 18px;
        text-decoration: none;
        padding: 0 20px;
        text-align: center;
        color : black;
        border-radius: 10px
    }
    .card-footer .media-detail li a:hover {
        background-color: #555555;
    }
    .grid {
        display: grid;
        grid-template-columns: repeat(3,auto);
        grid-column-gap: 30px
    }

    @media (max-width:426px) {
        .grid {
            display: grid;
            grid-template-columns: repeat(1,auto);
            grid-column-gap: 30px
        }
    }
    .single-page-header {
        margin-bottom: 65px;
        padding: 60px 0;
        position: relative;
        margin-top: 80px;
    }
</style>