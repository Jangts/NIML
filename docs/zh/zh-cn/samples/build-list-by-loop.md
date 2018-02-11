### NIML示例

原始的template.niml:
```html
<html>
<head>
<ni:var name="$title">My First NIML Template</ni:var>
<title><ni:echo name="$title" /></title>
<head>
<body>
<h1>My Heading</h1>
<ul>
<ni:loop index="$index" steps="10" stepvalue="1">
	<li><p>Paragraph <ni:echo name="$index" /></p></li>
</ni:loop>
</ul>
</body>
</html>
```

以上写法为原生标准写法，实际编写中，存在各种不同的简写方案。具体请参考[NIML标签参考手册]()



编译后的template.php:

```php
<?php
/*
 * PHP CODE COMPILED FROM NIML
 * CODE START
 */
echo '<html><head><title>';
$title = 'My First NIML Template';
echo $title;
echo '</title></head><body><h1>My Heading</h1><ul>';
for( $index=0; $index<10; $index++ ){
	echo '<li><p>Paragraph ';
	echo $index;
	echo '</p></li>';
}
echo '</ul></body></html>';
/*
 * CODE END
 */
```

最终输出的HTML文件:
```html
<html>
<head>
<title>My First NIML Template</title>
<head>
<body>
<h1>My Heading</h1>
<ul>
	<li><p>Paragraph 0</p></li>
	<li><p>Paragraph 1</p></li>
	<li><p>Paragraph 2</p></li>
	<li><p>Paragraph 3</p></li>
	<li><p>Paragraph 4</p></li>
	<li><p>Paragraph 5</p></li>
	<li><p>Paragraph 6</p></li>
	<li><p>Paragraph 7</p></li>
	<li><p>Paragraph 8</p></li>
  	<li><p>Paragraph 9</p></li>
</ul>
</body>
</html>
```

[点击查看更多实例]()



##### NIML编译器使用

[点击学习NIML编译器接口规范]()



##### NIML标签

[点击查看NIML标签参考手册]()