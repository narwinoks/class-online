module.exports = (sequelize, DataTypes) => {
  const Banner = sequelize.define(
    "Banner",
    {
      id: {
        type: DataTypes.INTEGER,
        autoIncrement: true,
        primaryKey: true,
        allowNUll: false,
      },
      image: {
        type: DataTypes.STRING,
        allowNUll: false,
      },
      title: {
        type: DataTypes.STRING,
        allowNUll: false,
      },
      description: {
        type: DataTypes.TEXT,
        allowNUll: false,
      },
      type:{
        type: DataTypes.ENUM,
        allowNUll: false,
        values: ["public", "my_learning", "my_course",'my_roadmap','discussions','webinar','tutorial'],
      },
      createdAt: {
        type: DataTypes.DATE,
        field: "created_at",
        allowNUll: false,
      },
      updatedAt: {
        type: DataTypes.DATE,
        field: "updated_at",
        allowNUll: false,
      },
    },
    {
      tableName: "banner",
      timestamps: true,
    }
  );
  return Banner;
};
