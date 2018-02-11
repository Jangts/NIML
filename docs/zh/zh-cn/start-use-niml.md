# 开始学习使用NIML

#### **NIML是什么？**

> NIML一款由TANGRAM TEK开发发布的**PHP模板引擎**，由该公司的智能交互式信息集成系统（I4s）**YangRAM**的标准库剥离出来，其设计初衷是为了编写**YangRAM Pages**页面模板更加面向前端人员。
>
> 作为与YangRAM系统最合拍的模板引擎，NIML本身并不依赖与YangRAM系统和其他TNI应用，完全是一个独立的模板引擎，可以配置使用在任何PHP应用中。



#### **NIML的特征**

> - 其标准语法类似XHTML，**直观易学，适合没有基础的初学者；**
> - 对常用标签提供类似JavaScript语法风格的简易写法，**对前端工程师和重构师十分友好；**
> - **编译式**模板引擎，一次编译长期使用；
> - 编译器亦由PHP语言编写，不依赖其他组控件；
> - 编译器**语法简单，易拓展**，适合高级使用者按需定制。



#### **为什么选择NIML？**

> 1. NIML作为一款轻PHP模板引擎，与大多数同类产品相比，最大的不同，是其十分尊重PHP语言本身，并一定程度上接受“**PHP自身就是非常优秀的模板引擎**”这一说法。所以，NIML在设计之初，就将自己定位在辅助前端人员书写PHP的定位上，不像其他同类产品完全设计一整套替代语法，几乎涵盖PHP的所有常用功能那样，而只是筛选了最常用的一些功能来设计NIML的基本标签（扩展标签的功能定位略不相同），使用者要学习的东西很少，马上就可以上手写NIML模板；
> 2. NIML在语法上分清层次，而不是刻意求简。NIML先是将所有标签设计成XHTML风格，保证了标签风格的统一性，也方便了只会少许标记语言的使用者；然后才挑选其中更为常用的标签，为他们设计了简化写法，且简化语法的设计又大量的参照JavaScript脚本语言，这样一来，新手重构师在学习js的过程中就可以同时学习NIML，熟手重构师和前端工程师更是直接拿来就用，极大的减少学习成本。
> 3. 对于本身就习惯写PHP原生模板的使用者，NIML提供 `<php></php>` 标签，支持以更人性的方法嵌入php脚本，看起来就跟在写HTML一样；而且对于PHP高手而言，使用NIML标签+NIML插件的方式书写模板，也会事半功倍。 `<php></php>` 标签和NIML插件功能是使NIML小而不漏的两项关键设计。



#### **第一个NIML模板**

```html
<html>
<head>
<ni:var name="$title">My First NIML Template</ni:var>
<title><ni:echo name="$title" /></title>
<head>
<body>
<ni:json name="$ordinals">
  	["First","Second","Third","Fourth","Fifth","Sixth","Seventh","Eighth","Ninth","Tenth"]
</ni:json>
<h1>My Heading</h1>
<ul>
<ni:loop index="$index" steps="10" stepvalue="1">
	<li><p>My <ni:echo name="$ordinals[$index]" /> Paragraph.</p></li>
</ni:loop>
</ul>
</body>
</html>
```
以上便是一个使用标准标签在严谨模式（非严谨模式可以省略 `ni` 命名空间）下书写的NIML模板 ，他看上去是不是和一般的XHTML很像？

或许你现在还不是十分理解这些标签的含义，但我相信等你学完下面的知识点后，也会觉得这不过是小case了。



#### **需要了解的知识点**