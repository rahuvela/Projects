library(party)
library(randomForest)
library(Boruta)
library(caret)
library(rpart)

mydata = read.csv("D:/IUB/dm/final project/abalone.csv" , stringsAsFactors=FALSE)
n=nrow(mydata)
y=ncol(mydata)
names(mydata) <- c("sex","length","diamete","height","wholeweight","shuckedweight","visceraweight","shellweight","rings")
#plot(mydata)

mydata$sex[mydata$sex == 'F'] <- 1
mydata$sex[mydata$sex == 'M'] <- 0
mydata$sex[mydata$sex == 'I'] <- 2

 for(i in 2:8){
   colmean = mean(mydata[,i])
   sd = sd(mydata[,i])
   for(j in 1:n){
     mydata[j,i]=(mydata[j,i]-colmean)/sd
     
   }
 }



data2class15 = mydata

for(i in 1:n){
  if(mydata[i,y] < 15){
    data2class15[i,y] = 0
  }else{
    data2class15[i,y] = 1
  }
}

data2class15$sex[data2class15$sex == 'F'] <- 1
data2class15$sex[data2class15$sex == 'M'] <- 0
data2class15$sex[data2class15$sex == 'I'] <- 2

training = data2class15[1:(as.integer(n*0.8)),]

treeTraining <- rpart(rings ~., method="class", data=training)
printcp(treeTraining)
ptree = prune(treeTraining, cp= treeTraining$cptable[which.min(treeTraining$cptable[,"xerror"]),"CP"])
print("pruned tree")
printcp(ptree)


pre = predict(ptree,training,type = 'class')
#pre=as.numeric(pre)
print(table(pre,training$rings))
#table(pre)

test=data2class15[(as.integer(n*0.8)):n,]
pre2 = predict(ptree,test,type = 'class')
print(table(pre2,test$rings))
t=table(pre2,test$rings)
library(e1071)
print(confusionMatrix(t))