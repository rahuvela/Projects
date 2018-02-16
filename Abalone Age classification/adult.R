library(party)
library(randomForest)
library(Boruta)
library(caret)
mydata = read.csv("D:/IUB/dm/final project/adult.csv")
n=nrow(mydata)
y=ncol(mydata)
names(mydata) <- c("age","workclass","fnlwgt","education","educationnum","maritalstatus","occupation","relationship","race","sex","capitalgain","capitalloss","hoursperweek","nativecountry","classlabel")
#plot(mydata)


#set.seed(123)
#boruta.train <- Boruta(classlabel ~ age+workclass+fnlwgt+education+educationnum+maritalstatus+occupation+relationship+race+sex+capitalgain+capitalloss+hoursperweek+nativecountry+classlabel, data = mydata, doTrace = 2)
#print(boruta.train)

traintree=randomForest(classlabel ~ age+workclass+fnlwgt+education+educationnum+maritalstatus+occupation+relationship+race+sex+capitalgain+capitalloss+hoursperweek+nativecountry+classlabel,data = mydata)

print(traintree)

testdata = read.csv("D:/IUB/dm/final project/adult.csv")
names(testdata) <- c("age","workclass","fnlwgt","education","educationnum","maritalstatus","occupation","relationship","race","sex","capitalgain","capitalloss","hoursperweek","nativecountry","classlabel")
#plot(mydata)

pred = predict(traintree,newdata = testdata)
p=table(pred,testdata$classlabel)
print(p)
