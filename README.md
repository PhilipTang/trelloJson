# trelloJson

从 Trello 看板中提取想要的信息

## 展示板子下所有列表

https://api.trello.com/1/boards/{boardId}/lists/58220749534c0d69766c5bac?cards=open&card_fields=name,desc&fields=name&key={key}&token={token}

## 展示列表下所有卡片

https://api.trello.com/1/lists/listId?cards=open&card_fields=name,desc&fields=name&key={key}&token={token}

## 用法


### 执行脚本

```shell
php grap.php key token
```

### 得到 md 和 html 输出文件

- output.md
- output.html



