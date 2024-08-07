<template>
    <a-range-picker
        v-model:value="dateRangeValue"
        :format="appSetting.date_format"
        :placeholder="[$t('common.start_date'), $t('common.end_date')]"
        style="width: 100%"
        @change="dateTimeChanged"
        :presets="rangePresets"
    />
</template>

<script>
import { defineComponent, onMounted, ref } from "vue";
import common from "../../../composable/common";
import { useI18n } from "vue-i18n";

export default defineComponent({
    props: {
        dateRange: {
            default: [],
        },
        formatType: {
            default: "YYYY-MM-DD HH:mm:ss",
        },
        showPreset: {
            default: true,
            type: Boolean,
        },
    },
    emits: ["dateTimeChanged"],
    setup(props, { emit }) {
        const dateRangeValue = ref([]);
        const { appSetting, dayjs } = common();
        const { t } = useI18n();

        onMounted(() => {
            if (props.dateRange && props.dateRange.length > 0) {
                dateRangeValue.value = [
                    dayjs(props.dateRange[0]),
                    dayjs(props.dateRange[1]),
                ];
            }
            if (!props.showPreset) {
                rangePresets.value = [];
            }
        });

        const dateTimeChanged = (newValue) => {
            if (newValue) {
                emit("dateTimeChanged", [
                    newValue[0]
                        .tz(appSetting.value.timezone)
                        .startOf("day")
                        .utc()
                        .format(props.formatType),
                    newValue[1]
                        .tz(appSetting.value.timezone)
                        .endOf("day")
                        .utc()
                        .format(props.formatType),
                ]);
            } else {
                emit("dateTimeChanged", []);
            }
        };

        const resetPicker = () => {
            dateRangeValue.value = [];
        };

        const setDatePicker = (dateValues) => {
            dateRangeValue.value = dateValues;
            dateTimeChanged(dateValues);
        };

        const rangePresets = ref([
            {
                label: t("dashboard.yesterday"),
                value: [
                    dayjs().add(-1, "d").startOf("day"),
                    dayjs().add(-1, "d").endOf("day"),
                ],
            },
            {
                label: t("dashboard.today"),
                value: [dayjs(), dayjs()],
            },
            {
                label: t("dashboard.last_7_days"),
                value: [dayjs().add(-7, "d"), dayjs()],
            },
            {
                label: t("dashboard.this_month"),
                value: [dayjs().startOf("month"), dayjs()],
            },
            {
                label: t("dashboard.this_year"),
                value: [dayjs().startOf("year"), dayjs()],
            },
        ]);


        return {
            appSetting,
            dateRangeValue,
            dateTimeChanged,
            resetPicker,
            setDatePicker,
            rangePresets,
        };
    },
});
</script>

<style></style>
