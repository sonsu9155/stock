[DEAFULTGP]
Name=交易所问询
ShowName=交易所问询
CmdNum=1
GPSetCode_Code1=1_600446
GPSetCode_Code2=1_600801
GPSetCode_Code3=1_600802
GPSetCode_Code4=1_600803
GPSetCode_Code5=1_600804
GPSetCode_Code6=1_600805
GPSetCode_Code7=1_600806
GPSetCode_Code8=1_600807
GPSetCode_Code9=1_600808
GPSetCode_Code10=1_600809
GPSetCode_Code11=1_600810
GPSetCode_Code12=1_600811
GPSetCode_Code13=1_600812
GPSetCode_Code14=0_002175
GPSetCode_Code15=1_600814
GPSetCode_Code16=1_600815
GPSetCode_Code17=1_600816
GPSetCode_Code18=1_600817
GPSetCode_Code19=1_600818
GPSetCode_Code20=1_600819
UnitNum=5
KeyGuyToExtern=0
ForceUseDS=0
PadMaxCx=0
PadMaxCy=0
PadHelpUrl=
UnSizeMode=0
AutoFitMode=2
UserPadFlag=0
RelType=0
CTPGroupType=0
AutoSize=0
FixedSwitchMode=0
[STEP0]
SplitWhich=-1
UnitStr=交易所问询
UnitDesc=
UnitGlStr=
UnitType=BIGDATA_UNIT
UnitStyle=ZST_BIG
HowToSplit=0
SplitRatio=100.0000
ShowGpNo=1
IsLocked=0
Fixed_Width=0
Fixed_Height=0
IsCurrent=1
OneCanShowSwitch=0
SwitchBarPos=1
SwitchBarScheme=5
CfgName=func_tzzhd111
ShowRefreshBtn=1
[STEP1]
SplitWhich=0
UnitStr=分时图
UnitDesc=
UnitGlStr=
UnitType=ZST_UNIT
UnitStyle=ZST_BIG
HowToSplit=1
SplitRatio=48.2974
ShowGpNo=1
IsLocked=0
Fixed_Width=0
Fixed_Height=0
IsCurrent=1
OneCanShowSwitch=1
SwitchBarPos=1
SwitchBarScheme=5
InitShowNum=0
FxtYAxisEmpty=2
WndNum=2
FXPeriod=5
Formula01=MA
Formula02=VOL-TDX
FxtColorIndex=
FxtExpIndex=
ShowRefreshBtn=0
ZstYAxisEmpty=0
ZstStyle=0
ZstUnitSwitch=0
ZSTManyDay=1
ManyDayZST=0
[STEP2]
SplitWhich=-2
UnitStr=分析图
UnitDesc=
UnitGlStr=
UnitType=FXT_UNIT
UnitStyle=FXT_BIG
HowToSplit=1
SplitRatio=48.2974
ShowGpNo=1
IsLocked=0
Fixed_Width=0
Fixed_Height=0
IsCurrent=0
OneCanShowSwitch=1
SwitchBarPos=1
SwitchBarScheme=5
CfgName=func_tzzhd106
ShowRefreshBtn=0
ZstYAxisEmpty=0
ZstStyle=0
ZstUnitSwitch=0
ZSTManyDay=1
ManyDayZST=0
InitShowNum=0
FxtYAxisEmpty=2
WndNum=2
FXPeriod=5
Formula01=MA2
Formula02=VOL-TDX
Formula03=DMA
FxtColorIndex=
FxtExpIndex=
[STEP3]
SplitWhich=1
UnitStr=历史明细详情
UnitDesc=
UnitGlStr=
UnitType=BIGDATA_UNIT
UnitStyle=ZST_BIG
HowToSplit=-1
SplitRatio=40.8575
ShowGpNo=1
IsLocked=0
Fixed_Width=0
Fixed_Height=0
IsCurrent=1
OneCanShowSwitch=0
SwitchBarPos=1
SwitchBarScheme=1
ShowPkxd=0
NoTitleArea=0
ShowRefreshBtn=1
CfgName=func_tzzhd106
[STEP4]
SplitWhich=1
UnitStr=行情
UnitDesc=
UnitGlStr=
UnitType=HQ_UNIT
UnitStyle=ZST_BIG
HowToSplit=1
SplitRatio=30.0129
ShowGpNo=1
IsLocked=0
Fixed_Width=225
Fixed_Height=0
IsCurrent=1
OneCanShowSwitch=0
ShowRefreshBtn=1
SwitchBarPos=0
SwitchBarScheme=0
ShowPkxd=0
NoTitleArea=0
