## 請全程由本人完成以下題目，作答不限時間

## 答題時可透過任何方式查閱資料，但最終請寫下自己的理解或經驗

## 請直接於題目下方空白作答

## 填答完成後請來信 [hr@trident-tech.com](mailto:hr@trident-tech.com) 以進行後續面試流程

## 所有人的答案卷都是獨立的，填寫途中如果有看到其他人的游標

## 那大概是我們的考官無聊來逛逛，請不要緊張 : )

## 

# 開始囉！

# 情境假設

假設你現在參與的是一個學生選課系統專案，課程資料有：課程名稱、簡介、上課時間、授課講師等資料，其他資料可自行憑生活經驗假設

* 上課時間有起訖時間，例如：1300 上課，1500 下課，可接受的格式為 hhmm  
* 授課講師需要有基本資訊：姓名、email

Restful API design (CRUD) 和 Database Design，課程資訊至少要有題目提到的資料。此外兩個題目是有延續性的，請往可搭配使用的方向去設計。

# Restful API design (CRUD)

請設計如下 API：

1. 課程列表 API (Read)  
   1. 需要有講師基本資訊  
   2. 多筆資料最多以兩筆表示即可  
2. 授課講師列表 API (Read)  
   1. 多筆資料最多以兩筆表示即可  
3. 授課講師所開課程列表 API (Read)  
   1. 多筆資料最多以兩筆表示即可  
4. 建立新講師 API (Create)  
5. 建立新課程 API (Create)  
6. 更新課程內容 API (Update)  
7. 刪除課程 API (Delete)

請先閱讀 RESTful API 相關資料，再用以下提供的格式開始答題：

1. [https://medium.com/itsems-frontend/api-%E6%98%AF%E4%BB%80%E9%BA%BC-restful-api-%E5%8F%88%E6%98%AF%E4%BB%80%E9%BA%BC-a001a85ab638](https://medium.com/itsems-frontend/api-%E6%98%AF%E4%BB%80%E9%BA%BC-restful-api-%E5%8F%88%E6%98%AF%E4%BB%80%E9%BA%BC-a001a85ab638)  
2. [HTTP response status code](https://developer.mozilla.org/en-US/docs/Web/HTTP/Status)

## 回答格式二選一

1. OpenAPI (online editor [https://editor.swagger.io/](https://editor.swagger.io/))，並繳交符合格式的 .yaml 檔或 .json 檔  
2. 不熟悉 OpenAPI，可用下方回答表格

### 回答表格

* request query parameters(query strings), request body,  response body 請用 json 格式回答  
* required 為必填欄位；optional 為選填欄位，請依需求填寫即可

| http method (required) |                             |      |
| :--------------------- | :-------------------------- | :--- |
| path(required)        |                             |      |
| request                | query parameters(optional) |      |
|                        | body(optional)             |      |
| response               | status code(required)      |      |
|                        | body(optional)             |      |

# Database Design

請設計一個關連式資料庫可對應此選課系統內容，需求如下：

1. 前一題的所有 APIs  
2. 講師  
   1. 持有帳號密碼可登入系統  
   2. 講師可查詢指定課程選課學生清單  
3. 學生  
   1. 持有帳號密碼可登入系統  
   2. 學生可即時選課或修改選課結果

## 請設計出所有必須資料表，包含但不限於以下資料

* table name  
* table columns  
  * name  
  * type  
* table indexes  
  * index 對應欄位與目的

關連式資料庫設計可參考：

1. [https://support.microsoft.com/zh-hk/office/%E8%B3%87%E6%96%99%E5%BA%AB%E8%A8%AD%E8%A8%88%E7%9A%84%E5%9F%BA%E6%9C%AC%E6%A6%82%E5%BF%B5-eb2159cf-1e30-401a-8084-bd4f9c9ca1f5](https://support.microsoft.com/zh-hk/office/%E8%B3%87%E6%96%99%E5%BA%AB%E8%A8%AD%E8%A8%88%E7%9A%84%E5%9F%BA%E6%9C%AC%E6%A6%82%E5%BF%B5-eb2159cf-1e30-401a-8084-bd4f9c9ca1f5) 

## 回答格式

可使用 [https://dbdiagram.io/home](https://dbdiagram.io/home)（請記得還有 table indexes）但不強制，任何能夠表達資料表設計與要求資訊的方式都可以

# Testing

## 請分享你接觸過的 Testing Framework 與撰寫測試的經驗

## 在第一題的 Restful API 設計中請試著隨意設計三個 API Test case，每個 test case 需包含以下資訊

1. Test case 的名稱與目的  
2. 測試需要用到測試資料（也可以說是假資料）  
3. 對應完成測試所需的 assertion

**如無測試相關經驗，可參考以下資料後，試著設計看看**

1. [https://tw.alphacamp.co/blog/tdd-test-driven-development-example](https://tw.alphacamp.co/blog/tdd-test-driven-development-example)  
2. [https://medium.com/%E6%88%91%E6%83%B3%E8%A6%81%E8%AE%8A%E5%BC%B7/tdd-test-driven-development-%E6%B8%AC%E8%A9%A6%E9%A9%85%E5%8B%95%E9%96%8B%E7%99%BC-%E5%85%A5%E9%96%80%E7%AF%87-e3f6f15c6651](https://medium.com/%E6%88%91%E6%83%B3%E8%A6%81%E8%AE%8A%E5%BC%B7/tdd-test-driven-development-%E6%B8%AC%E8%A9%A6%E9%A9%85%E5%8B%95%E9%96%8B%E7%99%BC-%E5%85%A5%E9%96%80%E7%AF%87-e3f6f15c6651) 

