-database:
--page builder (sidebar , slug ,title , type: (full , component , template) , data (section + column + package))

chỉ cần 1 bản pagebuilder là xong
--------------------------
--section (id , pbid , ord , payload {
container ,
background ,
class
} , layout , type = "section" )
--------------------------

--column (id , sid , ord , type="column" , payload(package))

--package (type , cid , data)
--------------------------
-design data:
data {
text: {
class:
content
type
};
image: {
type
content
class
options: {
href: ""
}
};
video: {
class
content
type
} ,
products: {
class ,
content: {

}
}
tab {
content: "" ,
class: ""
type: tab
options {
type: 'product/category' ,
color: ""
}
}
slides {
content: "" ,
class: ""
type: tab
options {
type: 'images/yt' (1 select type (làm add image giống chat app) , 2 button: add-link (component file -> remove , sort) )
,
color: ""
}
}
carouse: {
content:[
{
value: "";
link: "";

}
]
class:
type
options:{}
},

}

section/column/package

game danh muc -> game hot + game moi trong tab package
tab -> products , danh muc , color
slide images/video (number , type)
tách modal package editor ra riêng dùng push content khi edit
{{-- 12/4/23 --}}
làm phần add tab
làm tiếp phần page builder chia layout từng phần cho user product.... , làm responsive cho pagebuilder , làm edit cho
column
ưu tiên: làm style
tab cho các package (thêm vào setting column)
(12/4: backuped)
tạo full width cho column section
lam packages banner (max , min item responsive)
setting column
{{-- ----- --}}
làm package video slide + build home build banners category + connection 2 cái đó + làm api (làm nốt phần tabs(remove) với render gallery video)
