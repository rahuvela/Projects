library(party)
library(randomForest)
library(Boruta)
library(caret)

mydata = read.csv("D:/IUB/dm/final project/abalone.csv")
n=nrow(mydata)
y=ncol(mydata)
names(mydata) <- c("sex","length","diamete","height","wholeweight","shuckedweight","visceraweight","shellweight","rings")
#plot(mydata)


#print(cor(mydata[1:(n/2),2:9]))

traindata = mydata[1:(n/2),]
testdata = mydata[(n/4):n,]

#output_tree <- ctree(rings ~ shuckedweight+shellweight,
#  data = traindata)

#train_predict <- predict(output_tree,traindata,type="response")

#confusionMatrix()

#print(table(train_predict,traindata$rings))

#print(mean(train_predict != traindata$rings) * 100)

#summary(output.tree)
#plot(output_tree)
#pairs(~sex+length,data=mydata)


############################################################

#get the 2 class matrix
#mydata is the original data frame loaded from the csv file

data2class15 = mydata

for(i in 1:n){
  if(mydata[i,y] < 15){
    data2class15[i,y] = 15
  }else{
    data2class15[i,y] = 16
  }
}

#get only classes in range 4-18

data14class = mydata

data14class <- data14class[!(data14class$rings < 4),]

data14class <- data14class[!(data14class$rings > 18),]

#range 1-8 class 1 , 9-16 class 2 , 17-24 class 3 , 25-30 class 4.

data4class = mydata

for(i in 1:n){
#   if(mydata[i,y] <= 8){
#     data4class[i,y] = 1
#   }else if(mydata[i,y] <= 16 && mydata[i,y] > 8){
#     data4class[i,y] = 2
#   }else if(mydata[i,y] <= 24 && mydata[i,y] > 16){
#     data4class[i,y] = 3
# }else if(mydata[i,y] <= 30 && mydata[i,y] > 24){
#   data4class[i,y] = 4

  
#}
}

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


################################

#data for new variable with class strategy

newvar8data = datanewvar


for(i in 1:n){
  if(mydata[i,y] <= 4){
    newvar8data[i,4] = 1
  }else if(mydata[i,y] <= 8 && mydata[i,y] > 4){
    newvar8data[i,4] = 2
  }else if(mydata[i,y] <= 12 && mydata[i,y] > 8){
    newvar8data[i,4] = 3
  }else if(mydata[i,y] <= 16 && mydata[i,y] > 12){
    newvar8data[i,4] = 4
  }else if(mydata[i,y] <= 20 && mydata[i,y] > 16){
    newvar8data[i,4] = 5
  }else if(mydata[i,y] <= 24 && mydata[i,y] > 20){
    newvar8data[i,4] = 6
  }else if(mydata[i,y] <= 28 && mydata[i,y] > 24){
    newvar8data[i,4] = 7
  }else if(mydata[i,y] <= 32 && mydata[i,y] > 28){
    newvar8data[i,4] = 8
  }
}


data14classnewvar = datanewvar

data14classnewvar <- data14classnewvar[!(data14classnewvar$rings < 4),]

data14classnewvar <- data14classnewvar[!(data14classnewvar$rings > 18),]

########################8classes

data8class = mydata

for(i in 1:n){
  if(mydata[i,y] <= 4){
    data8class[i,y] = 1
  }else if(mydata[i,y] <= 8 && mydata[i,y] > 4){
    data8class[i,y] = 2
  }else if(mydata[i,y] <= 12 && mydata[i,y] > 8){
    data8class[i,y] = 3
  }else if(mydata[i,y] <= 16 && mydata[i,y] > 12){
    data8class[i,y] = 4
  }else if(mydata[i,y] <= 20 && mydata[i,y] > 16){
    data8class[i,y] = 5
  }else if(mydata[i,y] <= 24 && mydata[i,y] > 20){
    data8class[i,y] = 6
  }else if(mydata[i,y] <= 28 && mydata[i,y] > 24){
    data8class[i,y] = 7
  }else if(mydata[i,y] <= 32 && mydata[i,y] > 28){
    data8class[i,y] = 8
  }
}



###########################################################################

output_forest <- randomForest(sex ~ rings+length+diamete+height+wholeweight+shuckedweight+visceraweight+shellweight  , 
                              data = traindata , mtry=3, ntree=500, importance=TRUE, do.trace=100)


#train2=data4class[1:(n/2),]

#output_forest2 <- randomForest(sex ~ rings+length+diamete+height+wholeweight+shuckedweight+visceraweight+shellweight  , 
#                            data = train2 , mtry=3, ntree=500, importance=TRUE, do.trace=100)




# View the forest results.
print(output_forest2) 

# Importance of each predictor.

#importance(fit,type = 2)

pred <- predict(output.forest, newdata = testdata)
table(pred, testdata$sex)
print(table)

#set.seed(123)
#boruta.train <- Boruta(sex ~ rings+length+diamete+height+wholeweight+shuckedweight+visceraweight+shellweight, data = traindata, doTrace = 2)
#print(boruta.train)
