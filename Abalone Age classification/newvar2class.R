library(party)
library(randomForest)
library(Boruta)
library(caret)
library(rpart)
library(e1071)

abalone.cols = c("sex", "length", "diameter", "height", "whole weight", "shucked weight", "viscera weight", "shell weight", "rings");

url <- 'http://archive.ics.uci.edu/ml/machine-learning-databases/abalone/abalone.data';

abalone <- read.table(url, sep=",", row.names = NULL, col.names = abalone.cols, nrows=4177, stringsAsFactors=FALSE);

abalone$sex[abalone$sex == 'F'] <- 1
abalone$sex[abalone$sex == 'M'] <- 0
abalone$sex[abalone$sex == 'I'] <- 2

n = nrow(abalone)
trainp = (as.integer(n*0.8))





mydata = abalone


#create new variable

datanewvar = mydata

for(i in 1:n){
  datanewvar[i,2] = datanewvar[i,2] + datanewvar[i,3] + datanewvar[i,4]
  datanewvar[i,5] = datanewvar[i,6] + datanewvar[i,5]
}

#drops <- c("diamete","height","shuckedweight","visceraweight","shellweight")
#datanewvar[ , !(names(datanewvar) %in% drops)]

datanewvar <- datanewvar[,-3]
datanewvar <- datanewvar[,-3]
datanewvar <- datanewvar[,-4]
datanewvar <- datanewvar[,-4]
datanewvar <- datanewvar[,-4]

for(i in 2:3){
  colmean = mean(abalone[,i])
  sd = sd(abalone[,i])
  for(j in 1:n){
    abalone[j,i]=(abalone[j,i]-colmean)/sd
    
  }
}


data2class15 = datanewvar

for(i in 1:n){
  if(mydata[i,9] < 15){
    data2class15[i,4] = 0
  }else{
    data2class15[i,4] = 1
  }
}



datanewvarTraining <- data2class15[1:trainp,]
datanewvarTesting <- data2class15[trainp:n,]

datanewvarTreeTraining <- rpart(rings ~., method="class", data=datanewvarTraining)
#plot(datanewvarTreeTraining, uniform=TRUE, main="Classification Tree for data new var Training");
#text(datanewvarTreeTraining, use.n = TRUE, all=TRUE, cex=.8);

newrawPredict <- predict(datanewvarTreeTraining, datanewvarTesting, type="class");
cm <- table(newrawPredict, datanewvarTesting$rings);

print(datanewvarTreeTraining)
print("\n xerror")
printcp(datanewvarTreeTraining)


u = union(newrawPredict, datanewvarTesting$rings);
t = table(factor(newrawPredict, u), factor(datanewvarTesting$rings, u));
print(confusionMatrix(t))
