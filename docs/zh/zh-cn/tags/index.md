## NIML标签手册

NIML标签指NIML模板中NIML编译器编译成PHP源码的标签，而不是指文件中的所有标签。文件的所有标签应该还包括HTML标签、XHTML标签、XML标签，以前其他支持混写的模板引擎的标签。


以下是目前支持的所有NIML标签，按照字母顺序排列：

|          标签           | 属性                                      | 描述                                   |
| :-------------------: | --------------------------------------- | ------------------------------------ |
| [autoinc](autoinc.md) | name, [int], [inc]                      | 自增标签，常（但不限于）与while连用                 |
|    [call](call.md)    | onload,  args                           | 函数调用标签                               |
|   *[case](case.md)    | value                                   | 配合switch标签使用，必须是switch的子元素           |
|  [decode](decode.md)  | value                                   | 快速调用htmlspecialchars_decode函数，并打印其返值 |
|     [def](def.md)     | name, onload,  args                     | 以函数返值为值的赋值标签                         |
|    [each](each.md)    | data, [key], [value]                    | 遍历数据                                 |
|    [echo](echo.md)    | value                                   | 输出变量、常亮、类的静态属性、数组元素和对象属性             |
|    [else](else.md)    |                                         | 布尔判断分支标签，必须配合if使用，可以连续使用             |
| [extract](extract.md) | array                                   | 批量申明标签，可将数组的元素按键名批量定义为变量             |
|     [for](for.md)     |                                         | 一个综合的循环遍历标签，***高级标签***               |
|     [has](has.md)     | value, [list\|array]                    | 包含与否判断分支标签，包含元素则打印标签内的内容             |
|      [if](if.md)      |                                         | 一般布尔判断分支标签，符合条件则打印标签内的内容             |
| [include](include.md) | src                                     | 嵌套标签，用来嵌入其他NIML模板                    |
|    [join](join.md)    | array, [separator]                      | 连接标签，将数组的标量元素使用字符链接并输出               |
|    [json](json.md)    | name                                    | 多维数组定义标签，使用JSON格式书写                  |
|     [let](let.md)     |                                         | 使用等式赋值的赋值标签，***高级标签***               |
|     *[li](li.md)      | [value], [type]                         | 用来定义数组的项，必须是xl标签的子标签                 |
|    [loop](loop.md)    | steps, [stepvalue]                      | 等差记步循环标签                             |
|     [php](php.md)     |                                         | 嵌入标签，用来嵌入原生php语句                     |
|     [set](set.md)     | target, value                           | 为数组元素或对象的可写属性赋值                      |
|     [sql](sql.md)     | result, qs                              | 以SQL查询结果为值的赋值标签                      |
|     [str](str.md)     | value,  length, [start], [use-ellipsis] | 截取字符串                                |
|  [switch](switch.md)  | name                                    | 跳转试分支标签，根据参数的值跳转到相应的case标签           |
|    [time](time.md)    | format, [value]                         | 时间格式化标签                              |
|     [var](var.md)     | name, [value], [type]                   | 赋值标签                                 |
|       [w](w.md)       |                                         | 输出变量、常亮、类的静态属性、数组元素和对象属性，***高级标签***  |
|   [while](while.md)   |                                         | 条件循环标签                               |
|      [xl](xl.md)      | name                                    | 一维数组定义标签，使用XHTML格式书写                 |

**[]的属性为可省略属性*